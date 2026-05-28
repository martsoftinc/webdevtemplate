@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="animate-fade-slide">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-syne font-bold bg-gradient-to-r from-slate-900 to-slate-600 dark:from-white dark:to-slate-300 bg-clip-text text-transparent">
            Admin Dashboard
        </h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">Welcome back, {{ Auth::user()->name ?? 'Admin' }}! Here's what's happening with your platform today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Today's Registrations -->
        <div class="stat-card bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700 transition-all">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-xl">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 px-2 py-1 rounded-lg">Today</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 dark:text-white mb-1">00</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">New Registrations</div>
           
            <div class="mt-3 text-xs text-green-600 dark:text-green-400">↑ 01</div>
        </div>

        <!-- This Month Registrations -->
        <div class="stat-card bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700 transition-all">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-lg">This Month</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 dark:text-white mb-1"> 00525</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">New Registrations</div>
           
        </div>

                <!-- This Month Registrations -->
        <div class="stat-card bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700 transition-all">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-lg">This Month</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 dark:text-white mb-1"> 00525</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">New Registrations</div>
           
        </div>

                <!-- This Month Registrations -->
        <div class="stat-card bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700 transition-all">
            <div class="flex items-center justify-between mb-3">
                <div class="p-2 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/20 px-2 py-1 rounded-lg">This Month</span>
            </div>
            <div class="text-3xl font-bold text-slate-800 dark:text-white mb-1"> 00525</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">New Registrations</div>
           
        </div>
        

       

        
    </div>

    <!-- Recent Transactions Table -->
    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-slate-800 dark:text-white">Recent Transactions</h2>
            <a href="/transactions" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">View all →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full admin-table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr class="hover:bg-gray-50 dark:hover:bg-slate-700/50 transition-colors">
                        <td class="font-mono text-sm">#74747</td>
                        <td class="font-medium">74747</td>
                        <td>144747</td>
                        <td class="font-semibold text-emerald-600 dark:text-emerald-400">
                            GH₵ 56
                        </td>
                        <td class="text-sm text-gray-500">4</td>
                        <td>
                            <span class="status-badge bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 px-2 py-1 rounded-full text-xs font-semibold">
                                Completed
                            </span>
                        </td>
                    </tr>
                   <!-- @ empty-->
                    <tr>
                        <td colspan="6" class="text-center py-8 text-gray-500 dark:text-gray-400">
                            No transactions found
                        </td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>

    <!-- Additional Insights Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Registration Trends Card -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700">
            <h3 class="font-semibold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                </svg>
                Registration Trends
            </h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Today</span>
                    <div class="flex-1 mx-4">
                        <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 5544"></div>
                        </div>
                    </div>
                    <span class="text-sm font-semibold">t5t555</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">This Month</span>
                    <div class="flex-1 mx-4">
                        <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-2">
                            <div class="bg-emerald-600 h-2 rounded-full" style="width: 5565655"></div>
                        </div>
                    </div>
                    <span class="text-sm font-semibold">5555</span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">This Months</span>
                    <div class="flex-1 mx-4">
                        <div class="w-full bg-gray-200 dark:bg-slate-700 rounded-full h-2">
                            <div class="bg-emerald-600 h-2 rounded-full" style="width: 5565655"></div>
                        </div>
                    </div>
                    <span class="text-sm font-semibold">5555</span>
                </div>
           
            </div></div>

        <!-- Quick Actions Card -->
        <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-sm border border-gray-100 dark:border-slate-700">
            <h3 class="font-semibold text-slate-800 dark:text-white mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Quick Actions
            </h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="/users" class="text-center p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition">
                    <svg class="w-6 h-6 mx-auto mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="text-sm font-medium">Manage Users</span>
                </a>
                <a href="/admin/courses" class="text-center p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition">
                    <svg class="w-6 h-6 mx-auto mb-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/>
                    </svg>
                    <span class="text-sm font-medium">Build Courses</span>
                </a>
                <a href="/transactions" class="text-center p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition">
                    <svg class="w-6 h-6 mx-auto mb-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 8h6M6 12h12M8 16h8M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                    </svg>
                    <span class="text-sm font-medium">View Transactions</span>
                </a>
                <!-- 
                <a href="" class="text-center p-3 bg-gray-50 dark:bg-slate-700/50 rounded-xl hover:bg-gray-100 dark:hover:bg-slate-700 transition">
                    <svg class="w-6 h-6 mx-auto mb-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    <span class="text-sm font-medium">Track Progress</span>
                </a> -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush