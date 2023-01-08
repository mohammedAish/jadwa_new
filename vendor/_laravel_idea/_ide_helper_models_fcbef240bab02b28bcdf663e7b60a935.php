<?php //e8f703fc9fd4b6bda9d0c81297cd0c14
/** @noinspection all */

namespace App\Models {

    use App\Models\admin\Project;
    use Database\Factories\AdministExpenFactory;
    use Database\Factories\ProjectBpChannelResourceFactory;
    use Database\Factories\SliderFactory;
    use Database\Factories\SystemContactFactory;
    use Database\Factories\SystemServicesFactory;
    use Database\Factories\UserFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Support\Carbon;
    use LaravelIdea\Helper\App\Models\admin\_IH_Project_C;
    use LaravelIdea\Helper\App\Models\admin\_IH_Project_QB;
    use LaravelIdea\Helper\App\Models\_IH_AdministExpen_C;
    use LaravelIdea\Helper\App\Models\_IH_AdministExpen_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectBpChannelResource_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectBpChannelResource_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectBpDetails_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectBpDetails_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectBusinessPlan_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectBusinessPlan_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectCompatitor_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectCompatitor_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectProductDetail_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectProductDetail_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectTargetMarket_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectTargetMarket_QB;
    use LaravelIdea\Helper\App\Models\_IH_ProjectType_C;
    use LaravelIdea\Helper\App\Models\_IH_ProjectType_QB;
    use LaravelIdea\Helper\App\Models\_IH_Slider_C;
    use LaravelIdea\Helper\App\Models\_IH_Slider_QB;
    use LaravelIdea\Helper\App\Models\_IH_SystemContact_C;
    use LaravelIdea\Helper\App\Models\_IH_SystemContact_QB;
    use LaravelIdea\Helper\App\Models\_IH_SystemPage_C;
    use LaravelIdea\Helper\App\Models\_IH_SystemPage_QB;
    use LaravelIdea\Helper\App\Models\_IH_SystemServices_C;
    use LaravelIdea\Helper\App\Models\_IH_SystemServices_QB;
    use LaravelIdea\Helper\App\Models\_IH_User_C;
    use LaravelIdea\Helper\App\Models\_IH_User_QB;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_C;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;

    /**
     * @property int $id
     * @property string $item
     * @property string $value
     * @property Carbon|null $deleted_at
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_AdministExpen_QB onWriteConnection()
     * @method _IH_AdministExpen_QB newQuery()
     * @method static _IH_AdministExpen_QB on(null|string $connection = null)
     * @method static _IH_AdministExpen_QB query()
     * @method static _IH_AdministExpen_QB with(array|string $relations)
     * @method _IH_AdministExpen_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_AdministExpen_C|AdministExpen[] all()
     * @mixin _IH_AdministExpen_QB
     * @method static AdministExpenFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class AdministExpen extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property string $type
     * @property int $project_type_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property ProjectType $projectType
     * @method BelongsTo|_IH_ProjectType_QB projectType()
     * @method static _IH_ProjectBpChannelResource_QB onWriteConnection()
     * @method _IH_ProjectBpChannelResource_QB newQuery()
     * @method static _IH_ProjectBpChannelResource_QB on(null|string $connection = null)
     * @method static _IH_ProjectBpChannelResource_QB query()
     * @method static _IH_ProjectBpChannelResource_QB with(array|string $relations)
     * @method _IH_ProjectBpChannelResource_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] all()
     * @ownLinks project_type_id,\App\Models\ProjectType,id
     * @mixin _IH_ProjectBpChannelResource_QB
     * @method static ProjectBpChannelResourceFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class ProjectBpChannelResource extends Model {}

    /**
     * @property int $id
     * @property int $project_id
     * @property string $suggested_value
     * @property string $target_customer
     * @property string $vision
     * @property string $message
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ProjectBpDetails_QB onWriteConnection()
     * @method _IH_ProjectBpDetails_QB newQuery()
     * @method static _IH_ProjectBpDetails_QB on(null|string $connection = null)
     * @method static _IH_ProjectBpDetails_QB query()
     * @method static _IH_ProjectBpDetails_QB with(array|string $relations)
     * @method _IH_ProjectBpDetails_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectBpDetails_C|ProjectBpDetails[] all()
     * @ownLinks project_id,\App\Models\admin\Project,id
     * @mixin _IH_ProjectBpDetails_QB
     */
    class ProjectBpDetails extends Model {}

    /**
     * @property int $id
     * @property int $project_id
     * @property string $title
     * @property string $type
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ProjectBusinessPlan_QB onWriteConnection()
     * @method _IH_ProjectBusinessPlan_QB newQuery()
     * @method static _IH_ProjectBusinessPlan_QB on(null|string $connection = null)
     * @method static _IH_ProjectBusinessPlan_QB query()
     * @method static _IH_ProjectBusinessPlan_QB with(array|string $relations)
     * @method _IH_ProjectBusinessPlan_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectBusinessPlan_C|ProjectBusinessPlan[] all()
     * @ownLinks project_id,\App\Models\admin\Project,id
     * @mixin _IH_ProjectBusinessPlan_QB
     */
    class ProjectBusinessPlan extends Model {}

    /**
     * @property int $id
     * @property string $compatitor_vector1
     * @property string $compatitor_vector2
     * @property string $compatitor1
     * @property string $compatitor2
     * @property string $compatitor3
     * @property string $compatitor4
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ProjectCompatitor_QB onWriteConnection()
     * @method _IH_ProjectCompatitor_QB newQuery()
     * @method static _IH_ProjectCompatitor_QB on(null|string $connection = null)
     * @method static _IH_ProjectCompatitor_QB query()
     * @method static _IH_ProjectCompatitor_QB with(array|string $relations)
     * @method _IH_ProjectCompatitor_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectCompatitor_C|ProjectCompatitor[] all()
     * @mixin _IH_ProjectCompatitor_QB
     */
    class ProjectCompatitor extends Model {}

    /**
     * @property int $id
     * @property int $project_id
     * @property string $name
     * @property string $details
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ProjectProductDetail_QB onWriteConnection()
     * @method _IH_ProjectProductDetail_QB newQuery()
     * @method static _IH_ProjectProductDetail_QB on(null|string $connection = null)
     * @method static _IH_ProjectProductDetail_QB query()
     * @method static _IH_ProjectProductDetail_QB with(array|string $relations)
     * @method _IH_ProjectProductDetail_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectProductDetail_C|ProjectProductDetail[] all()
     * @ownLinks project_id,\App\Models\admin\Project,id
     * @mixin _IH_ProjectProductDetail_QB
     */
    class ProjectProductDetail extends Model {}

    /**
     * @property int $id
     * @property int $project_id
     * @property string $tam
     * @property string $value_tam
     * @property string $sam
     * @property string $value_sam
     * @property string $som
     * @property string $value_som
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ProjectTargetMarket_QB onWriteConnection()
     * @method _IH_ProjectTargetMarket_QB newQuery()
     * @method static _IH_ProjectTargetMarket_QB on(null|string $connection = null)
     * @method static _IH_ProjectTargetMarket_QB query()
     * @method static _IH_ProjectTargetMarket_QB with(array|string $relations)
     * @method _IH_ProjectTargetMarket_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectTargetMarket_C|ProjectTargetMarket[] all()
     * @ownLinks project_id,\App\Models\admin\Project,id
     * @mixin _IH_ProjectTargetMarket_QB
     */
    class ProjectTargetMarket extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property string $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @property _IH_ProjectBpChannelResource_C|ProjectBpChannelResource[] $projectResource
     * @property-read int $project_resource_count
     * @method HasMany|_IH_ProjectBpChannelResource_QB projectResource()
     * @property _IH_Project_C|Project[] $projects
     * @property-read int $projects_count
     * @method HasMany|_IH_Project_QB projects()
     * @method static _IH_ProjectType_QB onWriteConnection()
     * @method _IH_ProjectType_QB newQuery()
     * @method static _IH_ProjectType_QB on(null|string $connection = null)
     * @method static _IH_ProjectType_QB query()
     * @method static _IH_ProjectType_QB with(array|string $relations)
     * @method _IH_ProjectType_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ProjectType_C|ProjectType[] all()
     * @foreignLinks id,\App\Models\admin\Project,project_type_id|id,\App\Models\ProjectBpChannelResource,project_type_id
     * @mixin _IH_ProjectType_QB
     */
    class ProjectType extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property string $description
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Slider_QB onWriteConnection()
     * @method _IH_Slider_QB newQuery()
     * @method static _IH_Slider_QB on(null|string $connection = null)
     * @method static _IH_Slider_QB query()
     * @method static _IH_Slider_QB with(array|string $relations)
     * @method _IH_Slider_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Slider_C|Slider[] all()
     * @mixin _IH_Slider_QB
     * @method static SliderFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class Slider extends Model {}

    /**
     * @property int $id
     * @property string $type
     * @property string $title
     * @property string $value
     * @property Carbon|null $deleted_at
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_SystemContact_QB onWriteConnection()
     * @method _IH_SystemContact_QB newQuery()
     * @method static _IH_SystemContact_QB on(null|string $connection = null)
     * @method static _IH_SystemContact_QB query()
     * @method static _IH_SystemContact_QB with(array|string $relations)
     * @method _IH_SystemContact_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_SystemContact_C|SystemContact[] all()
     * @mixin _IH_SystemContact_QB
     * @method static SystemContactFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class SystemContact extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property string $content
     * @property string $type
     * @property string $key
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Carbon|null $deleted_at
     * @method static _IH_SystemPage_QB onWriteConnection()
     * @method _IH_SystemPage_QB newQuery()
     * @method static _IH_SystemPage_QB on(null|string $connection = null)
     * @method static _IH_SystemPage_QB query()
     * @method static _IH_SystemPage_QB with(array|string $relations)
     * @method _IH_SystemPage_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_SystemPage_C|SystemPage[] all()
     * @mixin _IH_SystemPage_QB
     */
    class SystemPage extends Model {}

    /**
     * @property int $id
     * @property string $title
     * @property string $price
     * @property string $image
     * @property string|null $route
     * @property string $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_SystemServices_QB onWriteConnection()
     * @method _IH_SystemServices_QB newQuery()
     * @method static _IH_SystemServices_QB on(null|string $connection = null)
     * @method static _IH_SystemServices_QB query()
     * @method static _IH_SystemServices_QB with(array|string $relations)
     * @method _IH_SystemServices_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_SystemServices_C|SystemServices[] all()
     * @mixin _IH_SystemServices_QB
     * @method static SystemServicesFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class SystemServices extends Model {}

    /**
     * @property int $id
     * @property string|null $name
     * @property string $email
     * @property Carbon|null $email_verified_at
     * @property string|null $phone
     * @property string|null $gender
     * @property string $type
     * @property string $status
     * @property string $password
     * @property string|null $country
     * @property string|null $city
     * @property string|null $address
     * @property string|null $whatsapp
     * @property string|null $linkedin
     * @property Carbon|null $deleted_at
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $notifications
     * @property-read int $notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB notifications()
     * @property _IH_Project_C|Project[] $projects
     * @property-read int $projects_count
     * @method HasMany|_IH_Project_QB projects()
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $readNotifications
     * @property-read int $read_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB readNotifications()
     * @property _IH_DatabaseNotification_C|DatabaseNotification[] $unreadNotifications
     * @property-read int $unread_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB unreadNotifications()
     * @method static _IH_User_QB onWriteConnection()
     * @method _IH_User_QB newQuery()
     * @method static _IH_User_QB on(null|string $connection = null)
     * @method static _IH_User_QB query()
     * @method static _IH_User_QB with(array|string $relations)
     * @method _IH_User_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_User_C|User[] all()
     * @foreignLinks id,\App\Models\admin\Project,owner_id|id,\App\Models\admin\Project,created_by
     * @mixin _IH_User_QB
     * @method static UserFactory factory(array|callable|int|null $count = null, array|callable $state = [])
     */
    class User extends Model {}
}
