<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @if(session()->has('success'))
                                <div class="bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                                    <span class="font-medium">{{ session()->get('success') }}</span>
                                </div>
                            @endif
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Logo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Website
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only"> </span>
                                    </th>
                                </tr>

                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <a href="{{route('companies.create')}}" class="text-indigo-600 hover:text-indigo-900">Create Company</a>
                                @foreach($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$company->name}}
                                            </div>
                        </div>
                     
                    </div>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">  {{$company->email}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  <img class="card-img-top" src="{{asset('/storage/images/'.$company->logo)}}" alt="Card image cap">
                </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{$company->website}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
{{--                        <form method="POST" action="{{route('companies.edit',$company->id)}}">--}}
{{--                            @csrf--}}
{{--                            @method('GET')--}}
{{--                            --}}
{{--                        </form>--}}
                        <a href="{{route('companies.edit',$company->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="POST" action="{{route('companies.destroy',$company->id)}}">
                            @csrf
                            @method('DELETE')
                            <button  class="text-indigo-600 hover:text-indigo-900">Delete</button>
                        </form>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                    </td>
                    </tr>
                @endforeach
                {{$companies->links()}}

                <!-- More people... -->

                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
</x-app-layout>
