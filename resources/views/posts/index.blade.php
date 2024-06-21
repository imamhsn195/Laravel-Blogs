<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }}
    </h2>
</x-slot>
<x-slot name="body">
    <x-tables.table>
        <x-slot name="body">
            <x-tables.anchor href="{{ route('posts.create') }}" class="btn btn-primary" text="Create Post"/>
                <x-slot name="tHead">
                        <tr>
                            <th class="px-6 py-3 text-left">
                                SL
                            </th>
                            <th class="px-6 py-3">
                                Title
                            </th>
                            <th class="px-6 py-3">
                                Contents
                            </th>
                            <th class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                </x-slot>
                <x-slot name="tBody">
                        @foreach ($posts as $post)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 text-left">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $post->content }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <x-tables.anchor href="{{ route('posts.show', $post->id) }}" class="btn btn-info" text="View"/> |
                                    <x-tables.anchor href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning" text="Edit"/> |
                                    <x-delete-form :action="route('posts.destroy', $post->id)" class="additional-classes"/>
                                </td>
                            </tr>
                        @endforeach
                </x-slot>
        </x-slot>
    </x-table>
</x-slot>
</x-app-layout>
