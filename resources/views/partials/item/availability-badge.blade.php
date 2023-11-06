@if ($item->transactions->last()?->transaction_type === App\Models\Transaction::BORROW)
    <small class="badge badge-error">
        Status: ausgeliehen bis {{ $item->transactions->last()->return_date->format('d.m.Y') }}
</small>
@else
    <small class="badge badge-success hyphens-none">
        Status: verfügbar
    </small>
@endif
