<table style="width: 100%; border: 1px solid #1a6fca; border-collapse: collapse;">
    <thead>
        <tr>
            <th style="background-color: #4a5568; color: #f7fafc">Id</th>
            <th style="background-color: #4a5568; color: #f7fafc">Type</th>
            <th style="background-color: #4a5568; color: #f7fafc">Amount</th>
            <th style="background-color: #4a5568; color: #f7fafc">Date</th>
            <th style="background-color: #4a5568; color: #f7fafc">Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{$transaction->id}}</td>
            <td>{{$transaction->type}}</td>
            <td>{{$transaction->amount}}</td>
            <td>{{$transaction->transaction_date}}</td>
            <td>{{$transaction->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
