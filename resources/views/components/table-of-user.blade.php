<div>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    @foreach($header as $head)
                        <th class="border border-gray-300 px-4 py-2 bg-gray-100">{{ $head }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr class="hover:bg-gray-50">
                        @foreach($row as $cell)
                            <td class="border border-gray-300 px-4 py-2">{{ $cell }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($header) }}" class="border border-gray-300 px-4 py-2 text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>