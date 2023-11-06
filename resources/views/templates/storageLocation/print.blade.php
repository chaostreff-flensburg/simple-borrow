Hello world
@include('partials.label', [
    'name' => $storageLocation->name,
    'id' => $storageLocation->id,
    'autoLoginLink' => $storageLocation->autoLoginLink,
    'url' => route('storageLocation.show', $storageLocation),
])
