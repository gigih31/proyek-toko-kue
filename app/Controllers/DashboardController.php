<?php namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $dashboardModel = new DashboardModel();

        $data['topMenus'] = $dashboardModel->getTopMenus();
        $data['processingOrdersCount'] = $dashboardModel->getProcessingOrdersCount();
        $data['pendingOrdersCount'] = $dashboardModel->getPendingOrdersCount();
        $data['completeOrdersCount'] = $dashboardModel->getCompleteOrdersCount();
        $data['usersCount'] = $dashboardModel->getUsersCount();

        return view('AdminDashboard', $data);
    }
}
