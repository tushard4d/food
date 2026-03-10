<div class="section-header d-flex flex-wrap justify-content-between mb-5">
    <h2 class="section-title">Filters</h2>
    <form method='GET' action = "/" id='filter-form'>

        <h6 class="mb-2">categories</h6>
        @foreach ($categories as $category)
            <label class="form-check-lable">
                <input type="checkbox" class="filter-category" name="category" value="{{ $category->id }}"
                    @checked( old('category')== $category->id)>
                {{ $category->name }}
            </label>
        @endforeach

        <h6 class="mt-4 mb-2">Price Range</h6>
        <div class="row g-2 mb-3">
            <div class="col-6">
                <input type="number" id="min_price" name="min_price" class="form-control" placeholder="Min ₹"
                    value="{{ request('min_price') }}">
            </div>
            <div class="col-6">
                <input type="number" id="max_price" name="max_price" class="form-control" placeholder="Max ₹"
                    value="{{ request('max_price') }}">
            </div>
        </div>

        <h6 class="mb-2">Rating</h6>
        @for ($i = 5; $i >= 1; $i--)
            <div class="form-check-lable">
                <input type="radio" class="filter-radio" name="rating" value="{{ $i }}"
                    id="rating-{{ $i }}" {{ request('rating') == $i ? 'checked' : '' }}>
                <label class="form-check-label" for="rating-{{ $i }}">
                    {{ $i }}★ & above
                </label>
            </div>
        @endfor

        {{-- <div class="d-grid gap-2 mt-4">
            <button type="button" class="btn btn-primary btn-sm apply-Filter">Apply Filters</button>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Clear Filters</a>
        </div> --}}
    </form>
