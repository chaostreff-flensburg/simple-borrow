@include('partials.label', [
    'name' => $item->name,
    'id' => $item->id,
    'autoLoginLink' => $item->autoLoginLink,
    'url' => route('item.show', $item),
])
