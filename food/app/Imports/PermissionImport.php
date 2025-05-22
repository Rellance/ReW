<?php

namespace App\Imports;

use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\ToModel;

class PermissionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (empty($row[0])) {
            return null;
        }

        return new Permission([
            'name'       => $row[0],
            'guard_name' => $row[1] ?? 'admin',
            'group_name' => $row[2] ?? null,
        ]);
    }
}
