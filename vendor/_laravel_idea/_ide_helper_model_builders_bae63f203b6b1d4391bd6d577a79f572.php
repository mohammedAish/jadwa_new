<?php //e5cc739fda7cd7bca3fca20f352eddae
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models\admin {

    use App\Models\admin\Project;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method Project|null getOrPut($key, $value)
     * @method Project|$this shift(int $count = 1)
     * @method Project|null firstOrFail(callable|string $key = null, $operator = null, $value = null)
     * @method Project|$this pop(int $count = 1)
     * @method Project|null pull($key, \Closure $default = null)
     * @method Project|null last(callable $callback = null, \Closure $default = null)
     * @method Project|$this random(callable|int|null $number = null)
     * @method Project|null sole(callable|string $key = null, $operator = null, $value = null)
     * @method Project|null get($key, \Closure $default = null)
     * @method Project|null first(callable $callback = null, \Closure $default = null)
     * @method Project|null firstWhere(callable|string $key, $operator = null, $value = null)
     * @method Project|null find($key, $default = null)
     * @method Project[] all()
     */
    class _IH_Project_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Project[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Project_QB whereId($value)
     * @method _IH_Project_QB whereProjectTypeId($value)
     * @method _IH_Project_QB whereOwnerId($value)
     * @method _IH_Project_QB whereCreatedBy($value)
     * @method _IH_Project_QB whereName($value)
     * @method _IH_Project_QB whereIdea($value)
     * @method _IH_Project_QB whereLogo($value)
     * @method _IH_Project_QB whereCountry($value)
     * @method _IH_Project_QB whereCity($value)
     * @method _IH_Project_QB whereLanguage($value)
     * @method _IH_Project_QB whereStartDate($value)
     * @method _IH_Project_QB whereDevelopmentDuration($value)
     * @method _IH_Project_QB whereNumberDaysYear($value)
     * @method _IH_Project_QB whereVat($value)
     * @method _IH_Project_QB whereCurrency($value)
     * @method _IH_Project_QB whereStudyDuration($value)
     * @method _IH_Project_QB whereCreatedAt($value)
     * @method _IH_Project_QB whereUpdatedAt($value)
     * @method _IH_Project_QB whereDeletedAt($value)
     * @method Project baseSole(array|string $columns = ['*'])
     * @method Project create(array $attributes = [])
     * @method _IH_Project_C|Project[] cursor()
     * @method Project|null|_IH_Project_C|Project[] find($id, array|string $columns = ['*'])
     * @method _IH_Project_C|Project[] findMany(array|Arrayable $ids, array|string $columns = ['*'])
     * @method Project|_IH_Project_C|Project[] findOr($id, array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method Project|_IH_Project_C|Project[] findOrFail($id, array|string $columns = ['*'])
     * @method Project|_IH_Project_C|Project[] findOrNew($id, array|string $columns = ['*'])
     * @method Project first(array|string $columns = ['*'])
     * @method Project firstOr(array|\Closure|string $columns = ['*'], \Closure $callback = null)
     * @method Project firstOrCreate(array $attributes = [], array $values = [])
     * @method Project firstOrFail(array|string $columns = ['*'])
     * @method Project firstOrNew(array $attributes = [], array $values = [])
     * @method Project firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Project forceCreate(array $attributes)
     * @method _IH_Project_C|Project[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Project_C|Project[] get(array|string $columns = ['*'])
     * @method Project getModel()
     * @method Project[] getModels(array|string $columns = ['*'])
     * @method _IH_Project_C|Project[] hydrate(array $items)
     * @method Project make(array $attributes = [])
     * @method Project newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Project[]|_IH_Project_C paginate(\Closure|int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Project[]|_IH_Project_C simplePaginate(int|null $perPage = null, array|string $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Project sole(array|string $columns = ['*'])
     * @method Project updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Project_QB extends _BaseBuilder {}
}
