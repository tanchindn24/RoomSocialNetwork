<?php

namespace App\Repositories\Admin;

use App\Models\PostCategories;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class AdminRepository extends BaseRepository
{
    /**
     * Get the model for the repository
     *
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function getProviderPagination($currentPage, $perPage)
    {
        $provider = User::where('role', 2)->paginate($perPage, ['*'], 'page', $currentPage);

        return $provider;
    }

    public function getSeekerPagination($currentPage, $perPage)
    {
        $seeker = User::where('role', 3)->paginate($perPage, ['*'], 'page', $currentPage);

        return $seeker;
    }

    public function getUserWithRolesPaginated($page, $perPage, $role)
    {
        $query = User::whereIn('role', $role)->paginate($perPage, ['*'], 'page', $page);
        return $query;
    }

    public function getUserAndPostCountPaginated($page, $perPage, $roles)
    {
        /*
         * ->selectRaw('users.*, COUNT(posts.id) as posts_count')
         * sử dụng phương thức selectRaw của Builder để đặt tên cho cột mới là posts_count
         */
        $query = User::withCount(['posts' => function ($query) {
            $query->select(DB::raw("COUNT(*)"));
        }])
            ->whereIn('role', $roles)
            ->whereHas('posts', function ($query) {
                $query->select(DB::raw("COUNT(*)"))
                    ->where('posts.user_id', DB::raw('users.id'));
            })
            ->paginate($perPage, ['*'], 'page', $page);
        return $query;
    }

    public function getAllPostsWithUser()
    {
        $posts = Posts::with(['user', 'category'])
            ->orderBy('created_at', 'desc')
            ->get();
        return $posts;
    }

}
