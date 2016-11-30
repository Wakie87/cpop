<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Collective\Html\HtmlBuilder;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\Datatables;
use Rap2hpoutre\LaravelLogViewer\LaravelLogViewer;

class UtilitiesController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Console\Kernel
     */
    protected $command;
    /**
     * @var \Collective\Html\HtmlBuilder
     */
    protected $html;
    /**
     * @var \Illuminate\Contracts\Logging\Log
     */
    protected $log;
    /**
     * Controller specific permission ability map.
     *
     * @var array
     */
    protected $customPermissionMap = [
        'backup' => 'view',
        'config' => 'view',
        'cache'  => 'view',
        'logs'   => 'view',
        'views'  => 'view',
        'index'  => 'view',
    ];

    /**
     * UtilitiesController constructor.
     *
     * @param \Illuminate\Contracts\Logging\Log $log
     * @param \Collective\Html\HtmlBuilder $html
     */
    public function __construct(Log $log, HtmlBuilder $html)
    {
        $this->html    = $html;
        $this->log     = $log;
    }

    /**
     * Display list of utilities.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        return view('utilities.index');
    }

    /**
     * Execute back up manually.
     *
     * @param string $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function backup($task = 'run')
    {
        if (! in_array($task, ['backup', 'clean'])) {
            $message = trans('utilities.backup.not_allowed',['task'=>$task]). trans('utilities.field.executed_by',['name'=>$this->getCurrentUserName()]);
            $this->log->info($message);
            return $this->notifyError($message);
        }
        Artisan::call('backup:' . $task);
        $message = $task == 'clean' ? trans('utilities.backup.cleanup_complete') : trans('utilities.backup.complete');
        $this->log->info($message . trans('utilities.field.executed_by',['name'=>$this->getCurrentUserName()]));
        return $this->notifySuccess($message);
    }

    /**
     * Get name of the current user.
     *
     * @return string
     */
    protected function getCurrentUserName()
    {
        return 'scott';
    }

    /**
     * Clear cache manually.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cache()
    {
        Artisan::call('cache:clear');
        $this->log->info(trans('utilities.cache.success') . trans('utilities.field.executed_by',['name'=>$this->getCurrentUserName()]));
        return $this->notifySuccess(trans('utilities.cache.success'));
    }

    /**
     * Run config artisan command manually.
     *
     * @param string $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function config($task)
    {
        if (! in_array($task, ['cache', 'clear'])) {
            $message = trans('utilities.config.not_allowed',['task'=>$task]). trans('utilities.field.executed_by',['name'=>$this->getCurrentUserName()]);
            $this->log->info($message);
            return $this->notifyError($message);
        }
        $message = $task == 'cache' ? trans('utilities.config.cache') : trans('utilities.config.cache_cleared');
        $this->log->info($message . trans('utilities.field.executed_by',['name'=>$this->getCurrentUserName()]));
        Artisan::call('config:' . $task);
        return $this->notifySuccess($message);
    }

    /**
     * Clear views manually.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function views()
    {
        Artisan::call('view:clear');
        $this->log->info(trans('utilities.views.success').trans('utilities.field.executed_by',['name'=>$this->getCurrentUserName()]));
        return alert()->success(trans('utilities.views.success'));
    }

    /**
     * Log viewer.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Exception
     */
    public function logs(Request $request, Datatables $datatables)
    {
        if ($request->input('l')) {
            LaravelLogViewer::setFile(base64_decode($request->input('l')));
        }
        if ($request->input('dl')) {
            return response()->download(LaravelLogViewer::pathToLogFile(base64_decode($request->input('dl'))));
        } elseif ($request->has('del')) {
            File::delete(LaravelLogViewer::pathToLogFile(base64_decode($request->input('del'))));
            return redirect()->to($request->url());
        }
        $logs = LaravelLogViewer::all();
        if ($request->wantsJson()) {
            return $datatables->collection(collect($logs))
                              ->editColumn('stack', '{!! nl2br($stack) !!}')
                              ->editColumn('level', function ($log) {
                                  $content = $this->html->tag('span', '', [
                                      'class' => "glyphicon glyphicon-{$log['level_img']}-sign",
                                  ]);
                                  $content .= '&nbsp;' . $log['level'];
                                  return $this->html->tag('span', $content, ['class' => "text-{$log['level_class']}"]);
                              })
                              ->addColumn('content', function ($log) {
                                  $html = '';
                                  if ($log['stack']) {
                                      $html = '<a class="pull-right expand btn btn-default btn-xs"><span class="glyphicon glyphicon-search"></span></a>';
                                  }
                                  $html .= $log['text'];
                                  if (isset($log['in_file'])) {
                                      $html .= '<br>' . $log['in_file'];
                                  }
                                  return $html;
                              })
                              ->make(true);
        }
        return view('utilities.log', [
            'logs'         => $logs,
            'files'        => LaravelLogViewer::getFiles(true),
            'current_file' => LaravelLogViewer::getFileName(),
        ]);
    }

    /**
     * Rebuild menu entity nested set tree.
     */
    public function rebuildMenu()
    {
        Menu::rebuild(true);
        return $this->notifySuccess(trans('utilities.menu.success'));
    }

    /**
     * Rebuild category entity nested set tree.
     */
    public function rebuildCategory()
    {
        Category::rebuild(true);
        return $this->notifySuccess(trans('utilities.category.success'));
    }
}