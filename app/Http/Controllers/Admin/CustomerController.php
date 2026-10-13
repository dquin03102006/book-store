<?php

namespace App\Http\Controllers\Admin;

class CustomerController extends UserManagementController
{
    protected string $role = 'customer';

    protected string $title = 'Khách hàng';

    protected string $prefix = 'admin.customers';
}
