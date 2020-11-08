<div id="content-page" class="content group">
    <div class="hentry group">
        {!! Form::open(['url' => route('store'), 'class' => 'contact-form',
 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <ul>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Название книги:</span><br>
                </label>
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user">
                        </i>
                    </span>
                    {!! Form::text('title', isset($book->title) ? $article->title : old('title'), ['placeholder' => 'Введите название книги']) !!}
                </div>
            </li>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Арендатор:</span><br>
                </label>
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user">
                        </i>
                    </span>
                    {!! Form::text('tenant', isset($book->tenant) ? $book->tenant : old('tenant'), ['placeholder' => 'Введите имя']) !!}
                </div>
            </li>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Количество:</span><br>
                </label>
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user">
                        </i>
                    </span>
                    {!! Form::text('count', isset($book->count) ? $book->count : old('count'), ['placeholder' => 'Укажите количество']) !!}
                </div>
            </li>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Срок аренды:</span><br>
                </label>
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user">
                        </i>
                    </span>
                    {!! Form::text('lease', isset($book->lease) ? $book->lease : old('lease'), ['placeholder' => 'Укажите срок аренды.']) !!}
                </div>
            </li>
            <li class="text-field">
                <label for="name-contact-us">
                    <span class="label">Сумма залога:</span><br>
                </label>
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user">
                        </i>
                    </span>
                    {!! Form::text('sum', isset($book->sum) ? $book->sum : old('sum'), ['placeholder' => 'Сумма залога']) !!}
                </div>
            </li>

            <li class="submit-button">
                {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon', 'type' => 'submit']) !!}
            </li>
        </ul>

        {!! Form::close() !!}

    </div>
</div>

