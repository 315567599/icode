<?php
    /**
     * Initialize this singleton.
     */
    protected function init()
    {
        $this->pluginManager = PluginManager::instance();
    }



    /**
     * Get the registered name of the component.
     * 
     * Resolves to:
     * - Backend\Classes\NavigationManager
     * 
     * @return string
     */



    /**
     * Registers a callback function that defines menu items.
     * The callback function should register menu items by calling the manager's
     * registerMenuItems() function. The manager instance is passed to the
     * callback function as an argument. Usage:
     * <pre>
     *   BackendMenu::registerCallback(function($manager){
     *       $manager->registerMenuItems([...]);
     *   });
     * </pre>
     * @param callable $callback A callable function.
     */
    public function registerCallback(callable $callback)
    {
        $this->callbacks[] = $callback;
    }


        /*
         * Load module items
         */
        foreach ($this->callbacks as $callback) {
            $callback($this);
        }


    /**
     * Returns information about the current navigation context.
     * @return mixed Returns an object with the following fields:
     * - mainMenuCode
     * - sideMenuCode
     * - owner
     */
    public function getContext()
    {
        return (object)[
            'mainMenuCode' => $this->contextMainMenuItemCode,
            'sideMenuCode' => $this->contextSideMenuItemCode,
            'owner' => $this->contextOwner
        ];
    }

        $module = isset($params[0]) ? $params[0] : 'backend';
        $controller = isset($params[1]) ? $params[1] : 'index';
        self::$action = $action = isset($params[2]) ? $this->parseAction($params[2]) : 'index';
        self::$params = $controllerParams = array_slice($params, 3);
        $controllerClass = '\\'.$module.'\Controllers\\'.$controller;


    protected function findController($controller, $action, $inPath)
    {
        /*
         * Workaround: Composer does not support case insensitivity.
         */
        if (!class_exists($controller)) {
            $controller = Str::normalizeClassName($controller);
            $controllerFile = $inPath.strtolower(str_replace('\\', '/', $controller)) . '.php';
            if ($controllerFile = File::existsInsensitive($controllerFile)) {
                include_once($controllerFile);
            }
        }

        if (!class_exists($controller)) {
            return false;
        }

        $controllerObj = App::make($controller);

        if ($controllerObj->actionExists($action)) {
            return $controllerObj;
        }

        return false;
    }


    /**
     * Execute the controller action.
     * @param string $action The action name.
     * @param array $params Routing parameters to pass to the action.
     * @return mixed The action result.
     */
    public function run($action = null, $params = [])
    {
        $this->action = $action;
        $this->params = $params;

        /*
         * Check security token.
         */
        if (!$this->verifyCsrfToken()) {
            return Response::make(Lang::get('backend::lang.page.invalid_token.label'), 403);
        }

        /*
         * Extensibility
         */
        if (
            ($event = $this->fireEvent('page.beforeDisplay', [$action, $params], true)) ||
            ($event = Event::fire('backend.page.beforeDisplay', [$this, $action, $params], true))
        ) {
            return $event;
        }

        /*
         * Determine if this request is a public action.
         */
        $isPublicAction = in_array($action, $this->publicActions);

        // Create a new instance of the admin user
        $this->user = BackendAuth::getUser();

        /*
         * Check that user is logged in and has permission to view this page
         */
        if (!$isPublicAction) {

            /*
             * Not logged in, redirect to login screen or show ajax error.
             */
            if (!BackendAuth::check()) {
                return Request::ajax()
                    ? Response::make(Lang::get('backend::lang.page.access_denied.label'), 403)
                    : Backend::redirectGuest('backend/auth');
            }

            /*
             * Check access groups against the page definition
             */
            if ($this->requiredPermissions && !$this->user->hasAnyAccess($this->requiredPermissions)) {
                return Response::make(View::make('backend::access_denied'), 403);
            }
        }


        /*
         * Set the admin preference locale
         */
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }
        elseif ($this->user && ($locale = BackendPreferences::get('locale'))) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        /*
         * Execute AJAX event
         */
        if ($ajaxResponse = $this->execAjaxHandlers()) {
            return $ajaxResponse;
        }

        /*
         * Execute postback handler
         */
        if (
            ($handler = post('_handler')) &&
            ($handlerResponse = $this->runAjaxHandler($handler)) &&
            $handlerResponse !== true
        ) {
            return $handlerResponse;
        }

        /*
         * Execute page action
         */
        $result = $this->execPageAction($action, $params);

        if (!is_string($result)) {
            return $result;
        }

        return Response::make($result, $this->statusCode);
    }

    //
    // CSRF Protection
    //

    /**
     * Checks the request data / headers for a valid CSRF token.
     * Returns false if a valid token is not found. Override this
     * method to disable the check.
     * @return bool
     */
    protected function verifyCsrfToken()
    {
        if (!Config::get('cms.enableCsrfProtection')) {
            return true;
        }

        if (in_array(Request::method(), ['HEAD', 'GET', 'OPTIONS'])) {
            return true;
        }

        $token = Request::input('_token') ?: Request::header('X-CSRF-TOKEN');

        return \Symfony\Component\Security\Core\Util\StringUtils::equals(
            Session::getToken(),
            $token
        );
    }


    /**
     * Returns a value suitable for the scope id property.
     */
    public function getId($suffix = null)
    {
        $id = 'scope';
        $id .= '-'.$this->scopeName;

        if ($suffix) {
            $id .= '-'.$suffix;
        }

        if ($this->idPrefix) {
            $id = $this->idPrefix . '-' . $id;
        }

        return HtmlHelper::nameToId($id);
    }


    /**
     * Checks if the field has the supplied [unfiltered] attribute.
     * @param  string $name
     * @param  string $position
     * @return bool
     */
    public function hasAttribute($name, $position = 'field')
    {
        if (!isset($this->attributes[$position])) {
            return false;
        }

        return array_key_exists($name, $this->attributes[$position]);
    }


    abstract public function getRecords($offset, $count);

    /**
     * Removes all records from the data source.
     * 清除的意思
     */
    abstract public function purge();

    /**
     * Resets all session data related to this widget.
     * @return void
     */
    public function resetSession()
    {
        $sessionId = $this->makeSessionId();
        Session::forget($sessionId);
    }


    protected function putSession($key, $value)


    /**
     * Guess the package path for the called class.
     * @param string $suffix An extra path to attach to the end
     * @param bool $isPublic Returns public path instead of an absolute one
     * @return string
     */
    public function guessViewPath($suffix = '', $isPublic = false)
    {
        $class = get_called_class();
        return $this->guessViewPathFrom($class, $suffix, $isPublic);
    }

    {
        $sessionId = $this->makeSessionId();

        $currentStore = $this->getSession();
        $currentStore[$key] = $value;

        Session::put($sessionId, serialize($currentStore));
    }




    public function afterSave()
    {
        Session::put('locale', $this->locale);
    }


    public function afterCreate()
    {
        $this->restorePurgedValues();

        if ($this->send_invite) {
            $this->sendInvitation();
        }
    }


    public function sendInvitation()
    {
        $data = [
            'name' => $this->full_name,
            'login' => $this->login,
            'password' => $this->getOriginalHashValue('password'),
            'link' => Backend::url('backend'),
        ];

        Mail::send('backend::mail.invite', $data, function ($message) {
            $message->to($this->email, $this->full_name);
        });
    }

    public function getGroupsOptions()
    {
        $result = [];
        foreach (UserGroup::all() as $group) {
            $result[$group->id] = [$group->name, $group->description];
        }
        return $result;
    }


    /**
     * {@inheritDoc}
     */
    public function getPath($path = null, $isPublic = false)
    {
        $path = RouterHelper::normalizeUrl($path);

        return $isPublic
            ? $this->defaultPublicSkinPath . $path
            : $this->defaultSkinPath . $path;
    }

    /**
     *      * Get the number of times the job has been attempted.
     *           *
     *                * @return int
     *                     */
    public function attempts()
    {
        return 1;
    }


    /**
     * Completely delete a theme from the system.
     * @param string $id Theme code/namespace
     * @return void
     */
    public function deleteTheme($theme)
    {
        if (!$theme) {
            return false;
        }

        if (is_string($theme)) {
            $theme = CmsTheme::load($theme);
        }

        if ($theme->isActiveTheme()) {
            throw new ApplicationException(trans('cms::lang.theme.delete_active_theme_failed'));
        }

        /*
         * Delete from file system
         */
        $themePath = $theme->getPath();
        if (File::isDirectory($themePath)) {
            File::deleteDirectory($themePath);
        }

        /*
         * Set uninstalled
         */
        if ($themeCode = $this->findByDirName($theme->getDirName())) {
            $this->setUninstalled($themeCode);
        }
    }


class Parameters extends Model
{
    use \October\Rain\Support\Traits\KeyParser;

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'system_parameters';

    public $timestamps = false;

    protected static $cache = [];

    /**
     * @var array List of attribute names which are json encoded and decoded from the database.
     */
    protected $jsonable = ['value'];

    /**
     * Clear the cache after saving.
     */
    public function afterSave()
    {
        Cache::forget(implode('-', [$this->table, $this->namespace, $this->group, $this->item]));
    }

    /**
     * Returns a setting value by the module (or plugin) name and setting name.
     * @param string $key Specifies the setting key value, for example 'system:updates.check'
     * @param mixed $default The default value to return if the setting doesn't exist in the DB.
     * @return mixed Returns the setting value loaded from the database or the default value.
     */
    public static function get($key, $default = null)
    {
        if (array_key_exists($key, static::$cache)) {
            return static::$cache[$key];
        }

        $record = static::findRecord($key);
        if (!$record) {
            return static::$cache[$key] = $default;
        }

        return static::$cache[$key] = $record->value;
    }

    /**
     * Stores a setting value to the database.
     * @param string $key Specifies the setting key value, for example 'system:updates.check'
     * @param mixed $value The setting value to store, serializable.
     */
    public static function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $_key => $_value) {
                static::set($_key, $_value);
            }
            return true;
        }

        $record = static::findRecord($key);
        if (!$record) {
            $record = new static;
            list($namespace, $group, $item) = $record->parseKey($key);
            $record->namespace = $namespace;
            $record->group = $group;
            $record->item = $item;
        }

        $record->value = $value;
        $record->save();

        static::$cache[$key] = $value;
        return true;
    }


    /**
     * Enable or disable cache
     * @param  boolean $value
     * @return self
     */
    public function useCache($value = true)
    {
        $this->useCache = $value;
        return $this;
    }


    /**
     * Finds a single Cms Object by its file name
     * @param  string $fileName
     * @return CmsObject
     */
    public function find($fileName)
    {
        if (!$this->theme) {
            $this->inEditTheme();
        }

        if ($this->useCache) {
            return forward_static_call([$this->cmsObject, 'loadCached'], $this->theme, $fileName);
        }
        else {
            return forward_static_call([$this->cmsObject, 'load'], $this->theme, $fileName);
        }
    }


        Cache::put($this->dataCacheKey, serialize($cached), 1440);

    /**
     * Returns information about all cached files.
     * @return mixed Returns an array representing the cached data or NULL.
     */
    protected function getCachedInfo()
    {
        $cached = Cache::get($this->dataCacheKey, false);
        if ($cached !== false && ($cached = @unserialize($cached)) !== false) {
            return $cached;
        }

        return null;
    }


            return Response::json([
                'success' => false,
                'code'    => 404,
                'msg'     => 'The post you were viewing has been deleted.',
                'url'     => URL::route('blog.posts.index'),
            ], 404);


        return Response::json(array_reverse($data));

    return $this->hasOne('App\Phone', 'foreign_key');
    return $this->hasOne('App\Phone', 'foreign_key', 'local_key');

    /**
     *  * Get the user that owns the phone.
     *   */
    public function user()
    {
            return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }

    return $this->hasMany('App\Comment', 'foreign_key', 'local_key');


    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;

    class UserController extends Controller
    {
        /**
         *      * Store a new user.
         *           *
         *                * @param  Request  $request
         *                     * @return Response
         *                          */
        public function store(Request $request)
        {
            $name = $request->input('name');

                }
       }

    if ($user->subscribed()) {


public function handle($request, Closure $next)
{
    if ($request->user() && ! $request->user()->subscribed()) {
        // This user is not a paying customer...
        return redirect('billing');
    }

    return $next($request);
}


if ($user->onTrial())
if ($user->cancelled()
public function getTaxPercent()
$user->subscription()->cancel();
$user->charge(100, [
    'source' => $token,
    'receipt_email' => $user->email,
]);


        catch (Exception $ex) {
            Flash::error($ex->getMessage());
        }


        UpdateManager::instance()->update();



            return $a->order > $b->order ? 1 : -1;


        return $this->permissionCache = $this->permissions;


    /**
     * Extend this object properties upon construction.
     */
    public static function extend(Closure $callback)
    {
        self::extendableExtendCallback($callback);
    }


        if (strpos($handler, '::')) {
   list($widgetName, $handlerName) = explode('::', $handler);
        }

        $id = class_basename(get_called_class()) . '-' . $this->action;

    protected function controllerMethodExists($methodName)
    {
        return method_exists($this->controller, $methodName);
    }


    public function __construct($section, $config = [])

    /**
     * Initialize this singleton.
     */
    protected function init()
    {
        $this->pluginManager = PluginManager::instance();
    }

        $this->defaultSkinPath = base_path() . '/modules/backend';

        $skinClass = Config::get('cms.backendSkin');
        $skinObject = new $skinClass();

        $record->ip_address = Request::getClientIp();


    public function afterSave()
    {
        Cache::forget(self::CACHE_KEY);
    }


        DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
        $affected = DB::update('update users set votes = 100 where name = ?', ['John']);
        DB::transaction(function () {
                DB::table('users')->update(['votes' => 1]);

                    DB::table('posts')->delete();
        });

        DB::beginTransaction();
        DB::rollBack();
        DB::commit();

        $user = DB::table('users')->where('name', 'John')->first();

        $titles = DB::table('roles')->lists('title');

        foreach ($titles as $title) {
                echo $title;
        }

        $users = DB::table('users')->count();

        $price = DB::table('orders')->max('price');
        
        $users = DB::table('users')->select('name', 'email as user_email')->get();
        $users = DB::table('users')->distinct()->get();


        $users = DB::table('users')
                -ele
            ->get();

    
        $users = DB::table('users')->where('votes', 100)->get();

        users = DB::table('users')
            ->whereBetween('votes', [1, 100])->get();

        users = DB::table('users')
            ->whereIn('id', [1, 2, 3])
            ->get();

        $users = DB::table('users')
                           ->orderBy('name', 'desc')
                                          ->get(); 

        $id = DB::table('users')->insertGetId(
                ['email' => 'john@example.com', 'votes' => 0]
            );

        DB::table('users')->insert([
            ['email' => 'taylor@example.com', 'votes' => 0],
            ['email' => 'dayle@example.com', 'votes' => 0]
        ]);

        DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);  

        DB::table('users')->increment('votes', 5);

        DB::table('users')->where('votes', '<', 100)->delete();


