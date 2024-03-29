@props(['editRole' => null])
<div>
    <article class="mx-3">
        <div class=" w-4/5 flex justify-start mb-2">
            <x-wire-input class="rounded-md" placeholder="Search... (Title)" live model="search" type="text"
                name="search" />
        </div>
        <table class="w-full border-collapse border dark:border-gray-500 border-blue-600">
            <thead class="dark:bg-customprimary bg-blue-600 text-white">
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody class="text-center dark:text-white">
                @foreach ($roles as $role)
                    <tr class="bg-white dark:even:bg-customsecondary dark:bg-[#2a3d5e]">
                        <td class="py-3 px-2">{{ $role->name }}</td>
                        <td class="py-3 px-2">{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                        <td class="flex text-white justify-center gap-2 py-3 px-2">
                            <a href="{{ route('roles.edit', $role) }}"
                                class="h-10 w-10 flex justify-center items-center rounded-md hover:bg-orange-300 cursor-pointer bg-orange-500"><i
                                    class=" fa-solid fa-pen-to-square"></i></a>
                            <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                @csrf
                                @method('DELETE')
                                <button class="h-10 w-10 bg-red-500 hover:bg-red-300 rounded-md cursor-pointer"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
</div>
