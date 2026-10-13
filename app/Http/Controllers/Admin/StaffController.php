<?php

namespace App\Http\Controllers\Admin;

class StaffController extends UserManagementController
{
    protected string $role = 'staff';

    protected string $title = 'Nhân viên';

    protected string $prefix = 'admin.staff';
}
