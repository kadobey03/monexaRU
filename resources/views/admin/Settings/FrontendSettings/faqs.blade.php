<a href="#" data-toggle="modal" data-target="#faqmodal" class="btn btn-primary"><i class="fa fa-plus"></i> Добавить FAQ</a>
<div id="faqmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title" style="text-align:center;">Добавить FAQ</h4>
                <button type="button" class="close " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body ">
                <form action="{{ route('savefaq') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h5 class="">Вопрос</h5>
                        <input type="text" name="question" placeholder="Введите вопрос здесь"
                            class="form-control  " required>
                    </div>
                    <div class="form-group">
                        <h5 class="">Ответ</h5>
                        <textarea name="answer" placeholder="Введите ответ на вопрос выше" class="form-control  " rows="4"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>

            </div>
        </div>
    </div>
</div>
