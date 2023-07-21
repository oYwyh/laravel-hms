<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;

class Users extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return User::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
        ->withGlobalSearch(columns: ['id','name','email'])
        ->column('id', sortable: true)
        ->column('name', canBeHidden:false , sortable: true)
        ->column('email', sortable: false)
        ->column('updated_at')
        ->column('action',exportAs:false)
        ->bulkAction(
            label: 'Touch timestamp',
            each: fn (User $user) => $user->touch(),
            before: fn () => info('Touching the selected Users'),
            after: fn () => Toast::info('Timestamps updated!')
        )
        ->bulkAction(
            label: 'Remove Users',
            each: fn (User $user) => $user->delete(),
            before: fn () => info('Remove the selected Users'),
            after: fn () => Toast::info('Users Removed!')
        )
        ->export()
        ->paginate(5);
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
