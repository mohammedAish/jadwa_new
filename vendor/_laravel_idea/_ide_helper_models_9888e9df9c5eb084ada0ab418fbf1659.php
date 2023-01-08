<?php //1dda8ee8e8fabd23c4f3e1079f37b643
/** @noinspection all */

namespace App\Models\admin {

    use App\Models\ProjectType;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\App\Models\admin\_IH_Project_C;
    use LaravelIdea\Helper\App\Models\admin\_IH_Project_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectType_QB;

    /**
     * @property int $id
     * @property int $project_type_id
     * @property int $owner_id
     * @property int $created_by
     * @property string $name
     * @property string $idea
     * @property string $logo
     * @property string $country
     * @property string $city
     * @property string $language
     * @property Carbon $start_date
     * @property int $development_duration
     * @property int $number_days_year
     * @property float $vat
     * @property string $currency
     * @property string|null $study_duration
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property ProjectType $projectType
     * @method BelongsTo|_IH_ProjectType_QB projectType()
     * @method static _IH_Project_QB onWriteConnection()
     * @method _IH_Project_QB newQuery()
     * @method static _IH_Project_QB on(null|string $connection = null)
     * @method static _IH_Project_QB query()
     * @method static _IH_Project_QB with(array|string $relations)
     * @method _IH_Project_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Project_C|Project[] all()
     * @ownLinks owner_id,\App\Models\User,id|created_by,\App\Models\User,id|project_type_id,\App\Models\ProjectType,id
     * @foreignLinks id,\App\Models\ProjectBusinessPlan,project_id|id,\App\Models\ProjectProductDetail,project_id|id,\App\Models\ProjectTargetMarket,project_id|id,\App\Models\ProjectBpDetails,project_id
     * @mixin _IH_Project_QB
     */
    class Project extends Model {}
}
