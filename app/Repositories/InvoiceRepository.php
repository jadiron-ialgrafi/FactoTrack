<?php

namespace App\Repositories;

class InvoiceRepository
{
    public function getTodayExpenses(): int
    {
        // Query the database for today's expenses
        return 8500;
    }

    public function getIncomeDetail(): int
    {
        // Query the database for income details
        return 7800;
    }

    public function getCompletedTasks(): int
    {
        // Query the database for completed tasks
        return 500;
    }

    public function getPendingTasks(): int
    {
        // Query the database for pending tasks
        return 650;
    }

    public function getTotalFeedback(): int
    {
        // Query the database for total feedback count
        return 385749;
    }

    public function getPositiveFeedback(): int
    {
        // Query the database for positive feedback percentage
        return 92;
    }

    public function getNegativeFeedback(): int
    {
        // Query the database for negative feedback percentage
        return 8;
    }

    public function getNewOrders(): array
    {
        // Fetch new orders data
        return [
            ['image' => './images/avatar/1.png', 'name' => 'Lew Shawon', 'product' => 'Dell-985', 'quantity' => '456 pcs', 'status' => 'Done', 'statusClass' => 'success'],
            ['image' => './images/avatar/2.png', 'name' => 'John Doe', 'product' => 'Asus-565', 'quantity' => '123 pcs', 'status' => 'Pending', 'statusClass' => 'warning'],
        ];
    }

    public function getProjects(): array
    {
        // Fetch project progress data
        return [
            ['name' => 'Website', 'progress' => 40],
            ['name' => 'Android', 'progress' => 60],
            ['name' => 'iOS', 'progress' => 70],
            ['name' => 'Mobile', 'progress' => 90],
        ];
    }
}
