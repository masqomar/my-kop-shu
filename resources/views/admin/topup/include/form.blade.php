<div class="form-group">
    <label>Anggota</label>
    <select class="chosen-select form-control @error('user_id') is-invalid @enderror" name="user_id[]" id="user-id" data-placeholder="Maksimal 10 orang ya...untuk 1x input" multiple required>
        @foreach ($users as $user)
        <option value="{!! $user['id'] !!}">
            {{ $user->member_id }} || {{ $user->first_name }}
        </option>
        @endforeach
    </select>
    @error('user_id')
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>

<div class="form-group">
    <label for="amount">{{ __('Nominal') }}</label>
    <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="10000" readonly required />
    @error('amount')
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>