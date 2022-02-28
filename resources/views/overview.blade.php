@extends('layouts.app')

@section('content')

<div class="pt-5">
    <form action="{{route('api.store')}}" class="" method="POST">
		@csrf
        <div class="border rounded-lg shadow-md px-3 py-3 flex flex-row bg-white relative">
            <div class="border-1 flex border border-gray-300 rounded-lg overflow-hidden w-max relative">
                <span class=" px-3 py-1 flex justify-center items-center bg-gray-200">Address:</span>
                <input type="text" name="address" id="address_input">
                <button class="py-2 px-4 bg-green-500 text-white font-semibold  shadow-md focus:outline-none">Add</button>


            </div>

            <div class="absolute left-0 top-full w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="hidden py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Account settings</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Support</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">License</a>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="py-2 align-middle inline-block min-w-full  ">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead>
          <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Id
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Address
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              GEO_Latitude
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              GEO_Longitude
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">


            @foreach ($addresses as $item)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray ">
                            {{$item->id}}
                            </div>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray capitalize">
                            {{$item->address}}
                            </div>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray">
                            {{$item->geo_lat}}
                            </div>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray ">
                            {{$item->geo_lon}}
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

          <!-- More rows... -->
        </tbody>
      </table>
    </div>
  </div>


@endsection
