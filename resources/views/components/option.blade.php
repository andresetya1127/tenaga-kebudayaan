@foreach (unserialize($data) as $agm)
    <option value="{{ $agm }}">{{ $agm }}</option>
@endforeach
