<?php //a2ce9ceda1023fbfd94060d9a8f7b583
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models {

    use App\Models\AdministExpen;
    use App\Models\ProjectBpChannelResource;
    use App\Models\ProjectBpDetails;
    use App\Models\ProjectBusinessPlan;
    use App\Models\ProjectCompatitor;
    use App\Models\ProjectProductDetail;
    use App\Models\ProjectTargetMarket;
    use App\Models\ProjectType;
    use App\Models\Slider;
    use App\Models\SystemContact;
    use App\Models\SystemPage;
    use App\Models\SystemServices;
    use App\Models\User;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method AdministExpen|null getOrPut($key, $value)
     * @method AdministExpen|$this shift(int $count = 1)
     * @method AdministExpen|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method AdministExpen|$this pop(int $count = 1)
     * @method AdministExpen|null pull($key, \Closure $default = null)
     * @method AdministExpen|null last(callable $callback = null, \Closure $default = null)
     * @method AdministExpen|$this random(callable|int|null $number = null)
     * @method AdministExpen|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method AdministExpen|null get($key, \Closure $default = null)
     * @method AdministExpen|null first(callable $callback = null, \Closure $default = null)
     * @method AdministExpen|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method AdministExpen|null find($key, $default = null)
     * @method AdministExpen[] all()
     */
    class _IH_AdministExpen_C extends _BaseCollection {
        /**
         * @param int $size
         * @return AdministExpen[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_AdministExpen_QB whereId($value)
     * @method _IH_AdministExpen_QB whereItem($value)
     * @method _IH_AdministExpen_QB whereValue($value)
     * @method _IH_AdministExpen_QB whereDeletedAt($value)
     * @method _IH_AdministExpen_QB whereCreatedAt($value)
     * @method _IH_AdministExpen_QB whereUpdatedAt($value)
     * @method AdministExpen baseSole(array|string $columns = ['*'])
     * @method AdministExpen create(array $attributes = [])
     * @method _IH_AdministExpen_C|AdministExpen[] cursor()
     * @method AdministExpen|null|_IH_AdministExpen_C|AdministExpen[] find($id, array|string $columns = ['*'])
     * @method _IH_AdministExpen_C|AdministExpen[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method AdministExpen|_IH_AdministExpen_C|AdministExpen[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method AdministExpen|_IH_AdministExpen_C|AdministExpen[] findOrFail($id, array|string $columns = ['*'])
     * @method AdministExpen|_IH_AdministExpen_C|AdministExpen[] findOrNew($id, array|string $columns = ['*'])
     * @method AdministExpen first(array|string $columns = ['*'])
     * @method AdministExpen firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method AdministExpen firstOrCreate(array $attributes = [], array $values = [])
     * @method AdministExpen firstOrFail(array|string $columns = ['*'])
     * @method AdministExpen firstOrNew(array $attributes = [], array $values = [])
     * @method AdministExpen firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method AdministExpen forceCreate(array $attributes)
     * @method _IH_AdministExpen_C|AdministExpen[] fromQuery(string $query, array $bindings = [])
     * @method _IH_AdministExpen_C|AdministExpen[] get(array|string $columns = ['*'])
     * @method AdministExpen getModel()
     * @method AdministExpen[] getModels(array|string $columns = ['*'])
     * @method _IH_AdministExpen_C|AdministExpen[] hydrate(array $items)
     * @method AdministExpen make(array $attributes = [])
     * @method AdministExpen newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|AdministExpen[]|_IH_AdministExpen_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|AdministExpen[]|_IH_AdministExpen_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method AdministExpen sole(array|string $columns = ['*'])
     * @method AdministExpen updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_AdministExpen_QB extends _BaseBuilder {}

    /**
     * @method ProjectBpChannelResource|null getOrPut($key, $value)
     * @method ProjectBpChannelResource|$this shift(int $count = 1)
     * @method ProjectBpChannelResource|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectBpChannelResource|$this pop(int $count = 1)
     * @method ProjectBpChannelResource|null pull($key, \Closure $default = null)
     * @method ProjectBpChannelResource|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectBpChannelResource|$this random(callable|int|null $number = null)
     * @method ProjectBpChannelResource|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectBpChannelResource|null get($key, \Closure $default = null)
     * @method ProjectBpChannelResource|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectBpChannelResource|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectBpChannelResource|null find($key, $default = null)
     * @method ProjectBpChannelResource[] all()
     */
    class _IH_ProjectBpChannelResource_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectBpChannelResource[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectBpChannelResource_QB whereId($value)
     * @method _IH_ProjectBpChannelResource_QB whereTitle($value)
     * @method _IH_ProjectBpChannelResource_QB whereType($value)
     * @method _IH_ProjectBpChannelResource_QB whereProjectTypeId($value)
     * @method _IH_ProjectBpChannelResource_QB whereCreatedAt($value)
     * @method _IH_ProjectBpChannelResource_QB whereUpdatedAt($value)
     * @method _IH_ProjectBpChannelResource_QB whereDeletedAt($value)
     * @method ProjectBpChannelResource baseSole(array|string $columns = ['*'])
     * @method ProjectBpChannelResource create(array $attributes = [])
     * @method _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] cursor()
     * @method ProjectBpChannelResource|null|_IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectBpChannelResource|_IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectBpChannelResource|_IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectBpChannelResource|_IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectBpChannelResource first(array|string $columns = ['*'])
     * @method ProjectBpChannelResource firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectBpChannelResource firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectBpChannelResource firstOrFail(array|string $columns = ['*'])
     * @method ProjectBpChannelResource firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectBpChannelResource firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectBpChannelResource forceCreate(array $attributes)
     * @method _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] get(array|string $columns = ['*'])
     * @method ProjectBpChannelResource getModel()
     * @method ProjectBpChannelResource[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] hydrate(array $items)
     * @method ProjectBpChannelResource make(array $attributes = [])
     * @method ProjectBpChannelResource newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectBpChannelResource[]|_IH_ProjectBpChannelResource_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectBpChannelResource[]|_IH_ProjectBpChannelResource_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectBpChannelResource sole(array|string $columns = ['*'])
     * @method ProjectBpChannelResource updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectBpChannelResource_QB extends _BaseBuilder {}

    /**
     * @method ProjectBpDetails|null getOrPut($key, $value)
     * @method ProjectBpDetails|$this shift(int $count = 1)
     * @method ProjectBpDetails|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectBpDetails|$this pop(int $count = 1)
     * @method ProjectBpDetails|null pull($key, \Closure $default = null)
     * @method ProjectBpDetails|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectBpDetails|$this random(callable|int|null $number = null)
     * @method ProjectBpDetails|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectBpDetails|null get($key, \Closure $default = null)
     * @method ProjectBpDetails|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectBpDetails|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectBpDetails|null find($key, $default = null)
     * @method ProjectBpDetails[] all()
     */
    class _IH_ProjectBpDetails_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectBpDetails[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectBpDetails_QB whereId($value)
     * @method _IH_ProjectBpDetails_QB whereProjectId($value)
     * @method _IH_ProjectBpDetails_QB whereSuggestedValue($value)
     * @method _IH_ProjectBpDetails_QB whereTargetCustomer($value)
     * @method _IH_ProjectBpDetails_QB whereVision($value)
     * @method _IH_ProjectBpDetails_QB whereMessage($value)
     * @method _IH_ProjectBpDetails_QB whereCreatedAt($value)
     * @method _IH_ProjectBpDetails_QB whereUpdatedAt($value)
     * @method ProjectBpDetails baseSole(array|string $columns = ['*'])
     * @method ProjectBpDetails create(array $attributes = [])
     * @method _IH_ProjectBpDetails_C|ProjectBpDetails[] cursor()
     * @method ProjectBpDetails|null|_IH_ProjectBpDetails_C|ProjectBpDetails[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectBpDetails_C|ProjectBpDetails[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectBpDetails|_IH_ProjectBpDetails_C|ProjectBpDetails[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectBpDetails|_IH_ProjectBpDetails_C|ProjectBpDetails[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectBpDetails|_IH_ProjectBpDetails_C|ProjectBpDetails[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectBpDetails first(array|string $columns = ['*'])
     * @method ProjectBpDetails firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectBpDetails firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectBpDetails firstOrFail(array|string $columns = ['*'])
     * @method ProjectBpDetails firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectBpDetails firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectBpDetails forceCreate(array $attributes)
     * @method _IH_ProjectBpDetails_C|ProjectBpDetails[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectBpDetails_C|ProjectBpDetails[] get(array|string $columns = ['*'])
     * @method ProjectBpDetails getModel()
     * @method ProjectBpDetails[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectBpDetails_C|ProjectBpDetails[] hydrate(array $items)
     * @method ProjectBpDetails make(array $attributes = [])
     * @method ProjectBpDetails newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectBpDetails[]|_IH_ProjectBpDetails_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectBpDetails[]|_IH_ProjectBpDetails_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectBpDetails sole(array|string $columns = ['*'])
     * @method ProjectBpDetails updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectBpDetails_QB extends _BaseBuilder {}

    /**
     * @method ProjectBusinessPlan|null getOrPut($key, $value)
     * @method ProjectBusinessPlan|$this shift(int $count = 1)
     * @method ProjectBusinessPlan|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectBusinessPlan|$this pop(int $count = 1)
     * @method ProjectBusinessPlan|null pull($key, \Closure $default = null)
     * @method ProjectBusinessPlan|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectBusinessPlan|$this random(callable|int|null $number = null)
     * @method ProjectBusinessPlan|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectBusinessPlan|null get($key, \Closure $default = null)
     * @method ProjectBusinessPlan|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectBusinessPlan|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectBusinessPlan|null find($key, $default = null)
     * @method ProjectBusinessPlan[] all()
     */
    class _IH_ProjectBusinessPlan_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectBusinessPlan[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectBusinessPlan_QB whereId($value)
     * @method _IH_ProjectBusinessPlan_QB whereProjectId($value)
     * @method _IH_ProjectBusinessPlan_QB whereTitle($value)
     * @method _IH_ProjectBusinessPlan_QB whereType($value)
     * @method _IH_ProjectBusinessPlan_QB whereCreatedAt($value)
     * @method _IH_ProjectBusinessPlan_QB whereUpdatedAt($value)
     * @method ProjectBusinessPlan baseSole(array|string $columns = ['*'])
     * @method ProjectBusinessPlan create(array $attributes = [])
     * @method _IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] cursor()
     * @method ProjectBusinessPlan|null|_IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectBusinessPlan|_IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectBusinessPlan|_IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectBusinessPlan|_IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectBusinessPlan first(array|string $columns = ['*'])
     * @method ProjectBusinessPlan firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectBusinessPlan firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectBusinessPlan firstOrFail(array|string $columns = ['*'])
     * @method ProjectBusinessPlan firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectBusinessPlan firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectBusinessPlan forceCreate(array $attributes)
     * @method _IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] get(array|string $columns = ['*'])
     * @method ProjectBusinessPlan getModel()
     * @method ProjectBusinessPlan[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] hydrate(array $items)
     * @method ProjectBusinessPlan make(array $attributes = [])
     * @method ProjectBusinessPlan newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectBusinessPlan[]|_IH_ProjectBusinessPlan_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectBusinessPlan[]|_IH_ProjectBusinessPlan_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectBusinessPlan sole(array|string $columns = ['*'])
     * @method ProjectBusinessPlan updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectBusinessPlan_QB extends _BaseBuilder {}

    /**
     * @method ProjectCompatitor|null getOrPut($key, $value)
     * @method ProjectCompatitor|$this shift(int $count = 1)
     * @method ProjectCompatitor|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectCompatitor|$this pop(int $count = 1)
     * @method ProjectCompatitor|null pull($key, \Closure $default = null)
     * @method ProjectCompatitor|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectCompatitor|$this random(callable|int|null $number = null)
     * @method ProjectCompatitor|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectCompatitor|null get($key, \Closure $default = null)
     * @method ProjectCompatitor|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectCompatitor|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectCompatitor|null find($key, $default = null)
     * @method ProjectCompatitor[] all()
     */
    class _IH_ProjectCompatitor_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectCompatitor[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectCompatitor_QB whereId($value)
     * @method _IH_ProjectCompatitor_QB whereCompatitorVector1($value)
     * @method _IH_ProjectCompatitor_QB whereCompatitorVector2($value)
     * @method _IH_ProjectCompatitor_QB whereCompatitor1($value)
     * @method _IH_ProjectCompatitor_QB whereCompatitor2($value)
     * @method _IH_ProjectCompatitor_QB whereCompatitor3($value)
     * @method _IH_ProjectCompatitor_QB whereCompatitor4($value)
     * @method _IH_ProjectCompatitor_QB whereCreatedAt($value)
     * @method _IH_ProjectCompatitor_QB whereUpdatedAt($value)
     * @method ProjectCompatitor baseSole(array|string $columns = ['*'])
     * @method ProjectCompatitor create(array $attributes = [])
     * @method _IH_ProjectCompatitor_C|ProjectCompatitor[] cursor()
     * @method ProjectCompatitor|null|_IH_ProjectCompatitor_C|ProjectCompatitor[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectCompatitor_C|ProjectCompatitor[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectCompatitor|_IH_ProjectCompatitor_C|ProjectCompatitor[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectCompatitor|_IH_ProjectCompatitor_C|ProjectCompatitor[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectCompatitor|_IH_ProjectCompatitor_C|ProjectCompatitor[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectCompatitor first(array|string $columns = ['*'])
     * @method ProjectCompatitor firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectCompatitor firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectCompatitor firstOrFail(array|string $columns = ['*'])
     * @method ProjectCompatitor firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectCompatitor firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectCompatitor forceCreate(array $attributes)
     * @method _IH_ProjectCompatitor_C|ProjectCompatitor[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectCompatitor_C|ProjectCompatitor[] get(array|string $columns = ['*'])
     * @method ProjectCompatitor getModel()
     * @method ProjectCompatitor[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectCompatitor_C|ProjectCompatitor[] hydrate(array $items)
     * @method ProjectCompatitor make(array $attributes = [])
     * @method ProjectCompatitor newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectCompatitor[]|_IH_ProjectCompatitor_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectCompatitor[]|_IH_ProjectCompatitor_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectCompatitor sole(array|string $columns = ['*'])
     * @method ProjectCompatitor updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectCompatitor_QB extends _BaseBuilder {}

    /**
     * @method ProjectProductDetail|null getOrPut($key, $value)
     * @method ProjectProductDetail|$this shift(int $count = 1)
     * @method ProjectProductDetail|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectProductDetail|$this pop(int $count = 1)
     * @method ProjectProductDetail|null pull($key, \Closure $default = null)
     * @method ProjectProductDetail|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectProductDetail|$this random(callable|int|null $number = null)
     * @method ProjectProductDetail|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectProductDetail|null get($key, \Closure $default = null)
     * @method ProjectProductDetail|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectProductDetail|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectProductDetail|null find($key, $default = null)
     * @method ProjectProductDetail[] all()
     */
    class _IH_ProjectProductDetail_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectProductDetail[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectProductDetail_QB whereId($value)
     * @method _IH_ProjectProductDetail_QB whereProjectId($value)
     * @method _IH_ProjectProductDetail_QB whereName($value)
     * @method _IH_ProjectProductDetail_QB whereDetails($value)
     * @method _IH_ProjectProductDetail_QB whereCreatedAt($value)
     * @method _IH_ProjectProductDetail_QB whereUpdatedAt($value)
     * @method ProjectProductDetail baseSole(array|string $columns = ['*'])
     * @method ProjectProductDetail create(array $attributes = [])
     * @method _IH_ProjectProductDetail_C|ProjectProductDetail[] cursor()
     * @method ProjectProductDetail|null|_IH_ProjectProductDetail_C|ProjectProductDetail[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectProductDetail_C|ProjectProductDetail[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectProductDetail|_IH_ProjectProductDetail_C|ProjectProductDetail[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectProductDetail|_IH_ProjectProductDetail_C|ProjectProductDetail[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectProductDetail|_IH_ProjectProductDetail_C|ProjectProductDetail[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectProductDetail first(array|string $columns = ['*'])
     * @method ProjectProductDetail firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectProductDetail firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectProductDetail firstOrFail(array|string $columns = ['*'])
     * @method ProjectProductDetail firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectProductDetail firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectProductDetail forceCreate(array $attributes)
     * @method _IH_ProjectProductDetail_C|ProjectProductDetail[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectProductDetail_C|ProjectProductDetail[] get(array|string $columns = ['*'])
     * @method ProjectProductDetail getModel()
     * @method ProjectProductDetail[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectProductDetail_C|ProjectProductDetail[] hydrate(array $items)
     * @method ProjectProductDetail make(array $attributes = [])
     * @method ProjectProductDetail newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectProductDetail[]|_IH_ProjectProductDetail_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectProductDetail[]|_IH_ProjectProductDetail_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectProductDetail sole(array|string $columns = ['*'])
     * @method ProjectProductDetail updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectProductDetail_QB extends _BaseBuilder {}

    /**
     * @method ProjectTargetMarket|null getOrPut($key, $value)
     * @method ProjectTargetMarket|$this shift(int $count = 1)
     * @method ProjectTargetMarket|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectTargetMarket|$this pop(int $count = 1)
     * @method ProjectTargetMarket|null pull($key, \Closure $default = null)
     * @method ProjectTargetMarket|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectTargetMarket|$this random(callable|int|null $number = null)
     * @method ProjectTargetMarket|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectTargetMarket|null get($key, \Closure $default = null)
     * @method ProjectTargetMarket|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectTargetMarket|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectTargetMarket|null find($key, $default = null)
     * @method ProjectTargetMarket[] all()
     */
    class _IH_ProjectTargetMarket_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectTargetMarket[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectTargetMarket_QB whereId($value)
     * @method _IH_ProjectTargetMarket_QB whereProjectId($value)
     * @method _IH_ProjectTargetMarket_QB whereTam($value)
     * @method _IH_ProjectTargetMarket_QB whereValueTam($value)
     * @method _IH_ProjectTargetMarket_QB whereSam($value)
     * @method _IH_ProjectTargetMarket_QB whereValueSam($value)
     * @method _IH_ProjectTargetMarket_QB whereSom($value)
     * @method _IH_ProjectTargetMarket_QB whereValueSom($value)
     * @method _IH_ProjectTargetMarket_QB whereCreatedAt($value)
     * @method _IH_ProjectTargetMarket_QB whereUpdatedAt($value)
     * @method ProjectTargetMarket baseSole(array|string $columns = ['*'])
     * @method ProjectTargetMarket create(array $attributes = [])
     * @method _IH_ProjectTargetMarket_C|ProjectTargetMarket[] cursor()
     * @method ProjectTargetMarket|null|_IH_ProjectTargetMarket_C|ProjectTargetMarket[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectTargetMarket_C|ProjectTargetMarket[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectTargetMarket|_IH_ProjectTargetMarket_C|ProjectTargetMarket[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectTargetMarket|_IH_ProjectTargetMarket_C|ProjectTargetMarket[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectTargetMarket|_IH_ProjectTargetMarket_C|ProjectTargetMarket[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectTargetMarket first(array|string $columns = ['*'])
     * @method ProjectTargetMarket firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectTargetMarket firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectTargetMarket firstOrFail(array|string $columns = ['*'])
     * @method ProjectTargetMarket firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectTargetMarket firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectTargetMarket forceCreate(array $attributes)
     * @method _IH_ProjectTargetMarket_C|ProjectTargetMarket[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectTargetMarket_C|ProjectTargetMarket[] get(array|string $columns = ['*'])
     * @method ProjectTargetMarket getModel()
     * @method ProjectTargetMarket[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectTargetMarket_C|ProjectTargetMarket[] hydrate(array $items)
     * @method ProjectTargetMarket make(array $attributes = [])
     * @method ProjectTargetMarket newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectTargetMarket[]|_IH_ProjectTargetMarket_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectTargetMarket[]|_IH_ProjectTargetMarket_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectTargetMarket sole(array|string $columns = ['*'])
     * @method ProjectTargetMarket updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectTargetMarket_QB extends _BaseBuilder {}

    /**
     * @method ProjectType|null getOrPut($key, $value)
     * @method ProjectType|$this shift(int $count = 1)
     * @method ProjectType|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectType|$this pop(int $count = 1)
     * @method ProjectType|null pull($key, \Closure $default = null)
     * @method ProjectType|null last(callable $callback = null, \Closure $default = null)
     * @method ProjectType|$this random(callable|int|null $number = null)
     * @method ProjectType|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method ProjectType|null get($key, \Closure $default = null)
     * @method ProjectType|null first(callable $callback = null, \Closure $default = null)
     * @method ProjectType|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method ProjectType|null find($key, $default = null)
     * @method ProjectType[] all()
     */
    class _IH_ProjectType_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ProjectType[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ProjectType_QB whereId($value)
     * @method _IH_ProjectType_QB whereTitle($value)
     * @method _IH_ProjectType_QB whereStatus($value)
     * @method _IH_ProjectType_QB whereCreatedAt($value)
     * @method _IH_ProjectType_QB whereUpdatedAt($value)
     * @method _IH_ProjectType_QB whereDeletedAt($value)
     * @method ProjectType baseSole(array|string $columns = ['*'])
     * @method ProjectType create(array $attributes = [])
     * @method _IH_ProjectType_C|ProjectType[] cursor()
     * @method ProjectType|null|_IH_ProjectType_C|ProjectType[] find($id, array|string $columns = ['*'])
     * @method _IH_ProjectType_C|ProjectType[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method ProjectType|_IH_ProjectType_C|ProjectType[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectType|_IH_ProjectType_C|ProjectType[] findOrFail($id, array|string $columns = ['*'])
     * @method ProjectType|_IH_ProjectType_C|ProjectType[] findOrNew($id, array|string $columns = ['*'])
     * @method ProjectType first(array|string $columns = ['*'])
     * @method ProjectType firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method ProjectType firstOrCreate(array $attributes = [], array $values = [])
     * @method ProjectType firstOrFail(array|string $columns = ['*'])
     * @method ProjectType firstOrNew(array $attributes = [], array $values = [])
     * @method ProjectType firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ProjectType forceCreate(array $attributes)
     * @method _IH_ProjectType_C|ProjectType[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ProjectType_C|ProjectType[] get(array|string $columns = ['*'])
     * @method ProjectType getModel()
     * @method ProjectType[] getModels(array|string $columns = ['*'])
     * @method _IH_ProjectType_C|ProjectType[] hydrate(array $items)
     * @method ProjectType make(array $attributes = [])
     * @method ProjectType newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ProjectType[]|_IH_ProjectType_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ProjectType[]|_IH_ProjectType_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ProjectType sole(array|string $columns = ['*'])
     * @method ProjectType updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ProjectType_QB extends _BaseBuilder {}

    /**
     * @method Slider|null getOrPut($key, $value)
     * @method Slider|$this shift(int $count = 1)
     * @method Slider|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method Slider|$this pop(int $count = 1)
     * @method Slider|null pull($key, \Closure $default = null)
     * @method Slider|null last(callable $callback = null, \Closure $default = null)
     * @method Slider|$this random(callable|int|null $number = null)
     * @method Slider|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method Slider|null get($key, \Closure $default = null)
     * @method Slider|null first(callable $callback = null, \Closure $default = null)
     * @method Slider|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method Slider|null find($key, $default = null)
     * @method Slider[] all()
     */
    class _IH_Slider_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Slider[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Slider_QB whereId($value)
     * @method _IH_Slider_QB whereTitle($value)
     * @method _IH_Slider_QB whereDescription($value)
     * @method _IH_Slider_QB whereCreatedAt($value)
     * @method _IH_Slider_QB whereUpdatedAt($value)
     * @method Slider baseSole(array|string $columns = ['*'])
     * @method Slider create(array $attributes = [])
     * @method _IH_Slider_C|Slider[] cursor()
     * @method Slider|null|_IH_Slider_C|Slider[] find($id, array|string $columns = ['*'])
     * @method _IH_Slider_C|Slider[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method Slider|_IH_Slider_C|Slider[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method Slider|_IH_Slider_C|Slider[] findOrFail($id, array|string $columns = ['*'])
     * @method Slider|_IH_Slider_C|Slider[] findOrNew($id, array|string $columns = ['*'])
     * @method Slider first(array|string $columns = ['*'])
     * @method Slider firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method Slider firstOrCreate(array $attributes = [], array $values = [])
     * @method Slider firstOrFail(array|string $columns = ['*'])
     * @method Slider firstOrNew(array $attributes = [], array $values = [])
     * @method Slider firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Slider forceCreate(array $attributes)
     * @method _IH_Slider_C|Slider[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Slider_C|Slider[] get(array|string $columns = ['*'])
     * @method Slider getModel()
     * @method Slider[] getModels(array|string $columns = ['*'])
     * @method _IH_Slider_C|Slider[] hydrate(array $items)
     * @method Slider make(array $attributes = [])
     * @method Slider newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Slider[]|_IH_Slider_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Slider[]|_IH_Slider_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Slider sole(array|string $columns = ['*'])
     * @method Slider updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Slider_QB extends _BaseBuilder {}

    /**
     * @method SystemContact|null getOrPut($key, $value)
     * @method SystemContact|$this shift(int $count = 1)
     * @method SystemContact|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method SystemContact|$this pop(int $count = 1)
     * @method SystemContact|null pull($key, \Closure $default = null)
     * @method SystemContact|null last(callable $callback = null, \Closure $default = null)
     * @method SystemContact|$this random(callable|int|null $number = null)
     * @method SystemContact|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method SystemContact|null get($key, \Closure $default = null)
     * @method SystemContact|null first(callable $callback = null, \Closure $default = null)
     * @method SystemContact|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method SystemContact|null find($key, $default = null)
     * @method SystemContact[] all()
     */
    class _IH_SystemContact_C extends _BaseCollection {
        /**
         * @param int $size
         * @return SystemContact[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_SystemContact_QB whereId($value)
     * @method _IH_SystemContact_QB whereType($value)
     * @method _IH_SystemContact_QB whereTitle($value)
     * @method _IH_SystemContact_QB whereValue($value)
     * @method _IH_SystemContact_QB whereDeletedAt($value)
     * @method _IH_SystemContact_QB whereCreatedAt($value)
     * @method _IH_SystemContact_QB whereUpdatedAt($value)
     * @method SystemContact baseSole(array|string $columns = ['*'])
     * @method SystemContact create(array $attributes = [])
     * @method _IH_SystemContact_C|SystemContact[] cursor()
     * @method SystemContact|null|_IH_SystemContact_C|SystemContact[] find($id, array|string $columns = ['*'])
     * @method _IH_SystemContact_C|SystemContact[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method SystemContact|_IH_SystemContact_C|SystemContact[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method SystemContact|_IH_SystemContact_C|SystemContact[] findOrFail($id, array|string $columns = ['*'])
     * @method SystemContact|_IH_SystemContact_C|SystemContact[] findOrNew($id, array|string $columns = ['*'])
     * @method SystemContact first(array|string $columns = ['*'])
     * @method SystemContact firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method SystemContact firstOrCreate(array $attributes = [], array $values = [])
     * @method SystemContact firstOrFail(array|string $columns = ['*'])
     * @method SystemContact firstOrNew(array $attributes = [], array $values = [])
     * @method SystemContact firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method SystemContact forceCreate(array $attributes)
     * @method _IH_SystemContact_C|SystemContact[] fromQuery(string $query, array $bindings = [])
     * @method _IH_SystemContact_C|SystemContact[] get(array|string $columns = ['*'])
     * @method SystemContact getModel()
     * @method SystemContact[] getModels(array|string $columns = ['*'])
     * @method _IH_SystemContact_C|SystemContact[] hydrate(array $items)
     * @method SystemContact make(array $attributes = [])
     * @method SystemContact newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|SystemContact[]|_IH_SystemContact_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|SystemContact[]|_IH_SystemContact_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method SystemContact sole(array|string $columns = ['*'])
     * @method SystemContact updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_SystemContact_QB extends _BaseBuilder {}

    /**
     * @method SystemPage|null getOrPut($key, $value)
     * @method SystemPage|$this shift(int $count = 1)
     * @method SystemPage|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method SystemPage|$this pop(int $count = 1)
     * @method SystemPage|null pull($key, \Closure $default = null)
     * @method SystemPage|null last(callable $callback = null, \Closure $default = null)
     * @method SystemPage|$this random(callable|int|null $number = null)
     * @method SystemPage|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method SystemPage|null get($key, \Closure $default = null)
     * @method SystemPage|null first(callable $callback = null, \Closure $default = null)
     * @method SystemPage|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method SystemPage|null find($key, $default = null)
     * @method SystemPage[] all()
     */
    class _IH_SystemPage_C extends _BaseCollection {
        /**
         * @param int $size
         * @return SystemPage[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_SystemPage_QB whereId($value)
     * @method _IH_SystemPage_QB whereTitle($value)
     * @method _IH_SystemPage_QB whereContent($value)
     * @method _IH_SystemPage_QB whereType($value)
     * @method _IH_SystemPage_QB whereCreatedAt($value)
     * @method _IH_SystemPage_QB whereUpdatedAt($value)
     * @method _IH_SystemPage_QB whereDeletedAt($value)
     * @method SystemPage baseSole(array|string $columns = ['*'])
     * @method SystemPage create(array $attributes = [])
     * @method _IH_SystemPage_C|SystemPage[] cursor()
     * @method SystemPage|null|_IH_SystemPage_C|SystemPage[] find($id, array|string $columns = ['*'])
     * @method _IH_SystemPage_C|SystemPage[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method SystemPage|_IH_SystemPage_C|SystemPage[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method SystemPage|_IH_SystemPage_C|SystemPage[] findOrFail($id, array|string $columns = ['*'])
     * @method SystemPage|_IH_SystemPage_C|SystemPage[] findOrNew($id, array|string $columns = ['*'])
     * @method SystemPage first(array|string $columns = ['*'])
     * @method SystemPage firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method SystemPage firstOrCreate(array $attributes = [], array $values = [])
     * @method SystemPage firstOrFail(array|string $columns = ['*'])
     * @method SystemPage firstOrNew(array $attributes = [], array $values = [])
     * @method SystemPage firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method SystemPage forceCreate(array $attributes)
     * @method _IH_SystemPage_C|SystemPage[] fromQuery(string $query, array $bindings = [])
     * @method _IH_SystemPage_C|SystemPage[] get(array|string $columns = ['*'])
     * @method SystemPage getModel()
     * @method SystemPage[] getModels(array|string $columns = ['*'])
     * @method _IH_SystemPage_C|SystemPage[] hydrate(array $items)
     * @method SystemPage make(array $attributes = [])
     * @method SystemPage newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|SystemPage[]|_IH_SystemPage_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|SystemPage[]|_IH_SystemPage_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method SystemPage sole(array|string $columns = ['*'])
     * @method SystemPage updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_SystemPage_QB extends _BaseBuilder {}

    /**
     * @method SystemServices|null getOrPut($key, $value)
     * @method SystemServices|$this shift(int $count = 1)
     * @method SystemServices|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method SystemServices|$this pop(int $count = 1)
     * @method SystemServices|null pull($key, \Closure $default = null)
     * @method SystemServices|null last(callable $callback = null, \Closure $default = null)
     * @method SystemServices|$this random(callable|int|null $number = null)
     * @method SystemServices|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method SystemServices|null get($key, \Closure $default = null)
     * @method SystemServices|null first(callable $callback = null, \Closure $default = null)
     * @method SystemServices|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method SystemServices|null find($key, $default = null)
     * @method SystemServices[] all()
     */
    class _IH_SystemServices_C extends _BaseCollection {
        /**
         * @param int $size
         * @return SystemServices[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_SystemServices_QB whereId($value)
     * @method _IH_SystemServices_QB whereTitle($value)
     * @method _IH_SystemServices_QB wherePrice($value)
     * @method _IH_SystemServices_QB whereImage($value)
     * @method _IH_SystemServices_QB whereRoute($value)
     * @method _IH_SystemServices_QB whereStatus($value)
     * @method _IH_SystemServices_QB whereCreatedAt($value)
     * @method _IH_SystemServices_QB whereUpdatedAt($value)
     * @method SystemServices baseSole(array|string $columns = ['*'])
     * @method SystemServices create(array $attributes = [])
     * @method _IH_SystemServices_C|SystemServices[] cursor()
     * @method SystemServices|null|_IH_SystemServices_C|SystemServices[] find($id, array|string $columns = ['*'])
     * @method _IH_SystemServices_C|SystemServices[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method SystemServices|_IH_SystemServices_C|SystemServices[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method SystemServices|_IH_SystemServices_C|SystemServices[] findOrFail($id, array|string $columns = ['*'])
     * @method SystemServices|_IH_SystemServices_C|SystemServices[] findOrNew($id, array|string $columns = ['*'])
     * @method SystemServices first(array|string $columns = ['*'])
     * @method SystemServices firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method SystemServices firstOrCreate(array $attributes = [], array $values = [])
     * @method SystemServices firstOrFail(array|string $columns = ['*'])
     * @method SystemServices firstOrNew(array $attributes = [], array $values = [])
     * @method SystemServices firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method SystemServices forceCreate(array $attributes)
     * @method _IH_SystemServices_C|SystemServices[] fromQuery(string $query, array $bindings = [])
     * @method _IH_SystemServices_C|SystemServices[] get(array|string $columns = ['*'])
     * @method SystemServices getModel()
     * @method SystemServices[] getModels(array|string $columns = ['*'])
     * @method _IH_SystemServices_C|SystemServices[] hydrate(array $items)
     * @method SystemServices make(array $attributes = [])
     * @method SystemServices newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|SystemServices[]|_IH_SystemServices_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|SystemServices[]|_IH_SystemServices_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method SystemServices sole(array|string $columns = ['*'])
     * @method SystemServices updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_SystemServices_QB extends _BaseBuilder {}

    /**
     * @method User|null getOrPut($key, $value)
     * @method User|$this shift(int $count = 1)
     * @method User|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method User|$this pop(int $count = 1)
     * @method User|null pull($key, \Closure $default = null)
     * @method User|null last(callable $callback = null, \Closure $default = null)
     * @method User|$this random(callable|int|null $number = null)
     * @method User|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method User|null get($key, \Closure $default = null)
     * @method User|null first(callable $callback = null, \Closure $default = null)
     * @method User|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method User|null find($key, $default = null)
     * @method User[] all()
     */
    class _IH_User_C extends _BaseCollection {
        /**
         * @param int $size
         * @return User[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_User_QB whereId($value)
     * @method _IH_User_QB whereName($value)
     * @method _IH_User_QB whereEmail($value)
     * @method _IH_User_QB whereEmailVerifiedAt($value)
     * @method _IH_User_QB wherePhone($value)
     * @method _IH_User_QB whereGender($value)
     * @method _IH_User_QB whereType($value)
     * @method _IH_User_QB whereStatus($value)
     * @method _IH_User_QB wherePassword($value)
     * @method _IH_User_QB whereCountry($value)
     * @method _IH_User_QB whereCity($value)
     * @method _IH_User_QB whereAddress($value)
     * @method _IH_User_QB whereWhatsapp($value)
     * @method _IH_User_QB whereLinkedin($value)
     * @method _IH_User_QB whereDeletedAt($value)
     * @method _IH_User_QB whereRememberToken($value)
     * @method _IH_User_QB whereCreatedAt($value)
     * @method _IH_User_QB whereUpdatedAt($value)
     * @method User baseSole(array|string $columns = ['*'])
     * @method User create(array $attributes = [])
     * @method _IH_User_C|User[] cursor()
     * @method User|null|_IH_User_C|User[] find($id, array|string $columns = ['*'])
     * @method _IH_User_C|User[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method User|_IH_User_C|User[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method User|_IH_User_C|User[] findOrFail($id, array|string $columns = ['*'])
     * @method User|_IH_User_C|User[] findOrNew($id, array|string $columns = ['*'])
     * @method User first(array|string $columns = ['*'])
     * @method User firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method User firstOrCreate(array $attributes = [], array $values = [])
     * @method User firstOrFail(array|string $columns = ['*'])
     * @method User firstOrNew(array $attributes = [], array $values = [])
     * @method User firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method User forceCreate(array $attributes)
     * @method _IH_User_C|User[] fromQuery(string $query, array $bindings = [])
     * @method _IH_User_C|User[] get(array|string $columns = ['*'])
     * @method User getModel()
     * @method User[] getModels(array|string $columns = ['*'])
     * @method _IH_User_C|User[] hydrate(array $items)
     * @method User make(array $attributes = [])
     * @method User newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|User[]|_IH_User_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|User[]|_IH_User_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method User sole(array|string $columns = ['*'])
     * @method User updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_User_QB extends _BaseBuilder {}
}
