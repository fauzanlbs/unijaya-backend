<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row[0] == 'Create') {
            $user = User::where('email', $row[1])->first();
            if (!$user) {
                $newuser = new User;
                $newuser->email = $row[1];
                $newuser->name = $row[2];
                $newuser->password = Hash::make($row[3]);
                $newuser->save();
            }
        }
        if ($row[0] == 'Update') {
            $user = User::where('email', $row[1])->first();
            if ($user) {
                $user->email = $row[1];
                $user->name = $row[2];
                $user->password = Hash::make($row[3]);
                $user->save();
            }
        }
        if ($row[0] == 'Delete') {
            $user = User::where('email', $row[1])->first();
            if ($user) {
                $user->delete();
            }
        }
    }
}
