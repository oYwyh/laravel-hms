<?php

namespace App\Tables;

use App\Models\Appointment;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;

class Appointments extends AbstractTable
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
        return Appointment::query();
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
        ->withGlobalSearch(columns: ['id','name','hospital','email'])
        ->column('id', sortable: true)
        ->column('patinet_id', sortable: true)
        ->column('doctor_id', sortable: true)
        ->column('date')
        ->column('status')
        ->column('updated_at', sortable: true)
        ->column('action',exportAs:false)
        ->bulkAction(
            label: 'Touch timestamp',
            each: fn (Appointment $appointment) => $appointment->touch(),
            before: fn () => info('Touching the selected Appointment'),
            after: fn () => Toast::info('Timestamps updated!')
        )
        ->bulkAction(
            label: 'Remove Doctors',
            each: fn (appointment $appointment) => $appointment->delete(),
            before: fn () => info('Remove the selected Appointment'),
            after: fn () => Toast::info('Doctors Removed!')
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
