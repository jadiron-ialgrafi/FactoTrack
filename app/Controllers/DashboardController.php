<?php

namespace App\Controllers;

use App\Repositories\InvoiceRepository;
use Twig\Environment;

class DashboardController
{
    private InvoiceRepository $invoiceRepository;
    private Environment $twig;

    public function __construct(InvoiceRepository $invoiceRepository, Environment $twig)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->twig = $twig;
    }

    public function index(): string
    {
        // Fetch data from the repository
        $cards = [
            ['title' => 'Today Expenses', 'icon' => 'fa-usd', 'value' => $this->invoiceRepository->getTodayExpenses(), 'progressBarClass' => 'progress-bar-success', 'progress' => 85],
            ['title' => 'Income Detail', 'icon' => 'fa-usd', 'value' => $this->invoiceRepository->getIncomeDetail(), 'progressBarClass' => 'progress-bar-primary', 'progress' => 75],
            ['title' => 'Task Completed', 'icon' => 'fa-tasks', 'value' => $this->invoiceRepository->getCompletedTasks(), 'progressBarClass' => 'progress-bar-warning', 'progress' => 50],
            ['title' => 'Task Pending', 'icon' => 'fa-tasks', 'value' => $this->invoiceRepository->getPendingTasks(), 'progressBarClass' => 'progress-bar-danger', 'progress' => 65],
        ];

        $feedback = [
            'total' => $this->invoiceRepository->getTotalFeedback(),
            'positive' => $this->invoiceRepository->getPositiveFeedback(),
            'negative' => $this->invoiceRepository->getNegativeFeedback(),
        ];

        $orders = $this->invoiceRepository->getNewOrders(); // Assume it returns an array of orders
        $projects = $this->invoiceRepository->getProjects(); // Assume it returns project progress

        // Dynamically scan the "partials" directory for Twig files
        $partialsDir = __DIR__ . '/../../resources/views/partials';
        $partials = $this->getTwigPartials($partialsDir);

        try {
            return $this->twig->render('admin/dashboard.twig', [
                'cards' => $cards,
                'feedback' => $feedback,
                'orders' => $orders,
                'projects' => $projects,
                'partials' => $partials,
            ]);
        } catch (\Twig\Error\LoaderError $e) {
            die('Error loading template: ' . $e->getMessage());
        } catch (\Twig\Error\RuntimeError $e) {
            die('Error rendering template: ' . $e->getMessage());
        } catch (\Twig\Error\SyntaxError $e) {
            die('Template syntax error: ' . $e->getMessage());
        }
    }

    private function getTwigPartials(string $directory): array
    {
        $partials = [];
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'twig') {
                $relativePath = str_replace(
                    [__DIR__ . '/../../resources/views/', '\\'],
                    ['', '/'],
                    $file->getPathname()
                );
                $section = basename(dirname($relativePath));
                if (!isset($partials[$section])) {
                    $partials[$section] = [];
                }
                $partials[$section][] = $relativePath;
            }
        }
        return $partials;
    }
}
