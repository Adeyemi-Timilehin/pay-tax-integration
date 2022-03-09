<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <h2 class="w-80 text-center font-semibold p-4 mt-9 text-xl text-white bg-blue-500 mx-9">Purchase Order from Vend</h2>
    <table class="table-auto mx-10 my-11">
        <thead>
          <tr class="border  border-blue-600">
            <th class="border border-blue-600 text-center p-5">InvoiceNumber</th>
            <th class="border border-blue-600 text-center p-5">AmountDue</th>
            <th class="border border-blue-600 text-center p-5">SubTotal</th>
            <th class="border border-blue-600 text-center p-5">Total</th>
          </tr>
        </thead>
        <tbody>
       <tr class="border  border-green-600 hover:bg-blue-200">
           @foreach ($out as $output)
           <td class="border border-blue-500 ext-center p-5">{{ $output['InvoiceNumber'] }}</td>
           <td class="border border-blue-500 ext-center p-5">{{ $output['AmountDue'] }}</td>
           <td class="border border-blue-500 ext-center p-5">{{ $output['SubTotal'] }}</td>
           <td class="border border-blue-500 ext-center p-5">{{ $output['Total'] }}</td>
          
          
       </tr>
       @endforeach 
        </tbody>
      </table>





</x-app-layout>
