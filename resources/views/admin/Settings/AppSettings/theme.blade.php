 <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h3>Загрузить новую тему (zip файл)</h3>
                <p>Ваша новая тема будет применена к панели пользователей после успешной загрузки.</p>
            </div>

        </div>
        <div class="text-center">
            <form method="post" action="{{route('theme.update')}}" enctype="multipart/form-data" id="themeForm">
                 @csrf
                <input type="file" name='theme' required>
                <button type="submit" class="px-4 btn btn-primary btn-sm" id="themeBtn">Сохранить</button>
                @error('theme')
                    <span class="text-danger d-block mt-2">{{ $message }}</span>
                @enderror
                @if (session()->has('error'))
                    <span class="text-danger d-block mt-2">{{ session('error') }}</span>
                @endif
            </form>
        </div>
    </div>
    <div class="mt-2 d-none" id="loadingTheme">
        <progress max="100"></progress>
        <p>Пожалуйста, подождите, пока загружается тема, не обновляйте эту страницу...</p>
    </div>
</div>
 <livewire:admin.theme-display />