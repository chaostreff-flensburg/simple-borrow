@if ($item->transactions->last()->transaction_type === App\Models\Transaction::RETURN)
    <small class="badge badge-success">
        Status: verfügbar
    </small>
@else
    <small class="badge badge-error">
        Status: ausgeliehen bis {{ $item->transactions->last()->return_date->format('d.m.Y') }}
    </small>
@endif
