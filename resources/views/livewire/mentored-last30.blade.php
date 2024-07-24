<x-dashboard-tile :position="$position" refresh-interval="30" class="w-full text-center">
    <div
        class="grid gap-2 justify-items-center h-full text-center"
        style="grid-template-rows: auto 1fr auto;"
    >
        <h1 class="font-medium text-dimmed text-sm uppercase tracking-wide tabular-nums">Mentored Last 30 Days</h1>
        <div class="self-center font-bold text-6xl tracking-wide leading-none">{{ number_format(App\Models\StatsBar::uniqueConversationsLast30Days()) }}</div>
    </div>
</x-dashboard-tile>
