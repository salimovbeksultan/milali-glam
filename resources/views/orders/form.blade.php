<div class="mb-3">
    @php
        $order = session('order')
    @endphp
    <label for="name" class="form-label">Имя получателя</label>
    <input type="text" id="name" name="name" @disabled(!is_null($order))
        value="{{ old('name', $order->name ?? '') }}" class="form-control" required>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Номер телефона</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">+7</span>
        </div>
        <input id="phone" type="text" name="phone" @disabled(!is_null($order))
            value="{{ old('phone', $order->phone ?? '') }}" class="form-control" required>
    </div>
    @error('phone')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Адрес</label>
    <textarea id="address" name="address" @disabled(!is_null($order)) class="form-control" rows="4" required>{{ old('address', $order->address ?? '') }}</textarea>
    @error('address')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
