<div>

    <div class="footer-first-content">

        <form action="{{ route('storeNewslatter') }}" method="POST">

            <span class="footer-first-item">
                @csrf

                <p>ПОДПИШИСЬ НА РАССЫЛКУ РЕЦЕПТОВ И СОВЕТОВ</p>

                <input type="email" name="email" placeholder="Адрес электронной почты">
                @error('email')
                    <div class="alert alert-danger mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <button type="submit">
                    Подписаться
                </button>

            </span>

        </form>

    </div>

</div>
