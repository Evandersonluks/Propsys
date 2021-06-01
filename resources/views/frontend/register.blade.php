<style>
    .login-container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    form {
        padding: 2rem;
        border: 1px solid gray;
        border-radius: 15px;
    }

    .form-field {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    form input {
        margin-left: 2rem;
    }
</style>

<div class="login-container">
    <form method="POST" action="{{ route('register-action') }}">
        @csrf

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('danger'))
            <div>
                {{ session('danger') }}
            </div>
        @endif
        
        <div class="form-field">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" aria-describedby="emailHelp">
        </div>
        <div class="form-field">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-field">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="password" id="pass">
        </div>
        <div class="form-field">
            <a href="{{ route('login') }}">Fazer login</a>
            <button type="submit" style="margin:1rem 0">Cadastrar</button>
        </div>
    </form>
</div>