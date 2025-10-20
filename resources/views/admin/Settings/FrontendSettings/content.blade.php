 {{-- <a href="#" data-toggle="modal" data-target="#content" class="btn btn-{{$text}}"><i class="fa fa-plus"></i> Add Content</a> --}}
 <div id="content" class="modal fade" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header ">
                 <h4 class="modal-title" style="text-align:center;">Добавить общий контент</h4>
                 <button type="button" class="close " data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body ">
                 <form action="{{ route('savecontents') }}" method="post">
                     {{ csrf_field() }}
                     <div class="form-group">
                         <h5 class=" ">Заголовок контента</h5>
                         <input type="text" name="title" placeholder="Название контента" class="form-control  "
                             required>
                     </div>
                     <div class="form-group">
                         <h5 class="">Описание контента</h5>
                         <textarea name="content" placeholder="Опишите контент" class="form-control  " rows="2" required></textarea>
                     </div>
                     <button type="submit" class="btn btn-primary">Сохранить</button>
                 </form>

             </div>
         </div>
     </div>
 </div>
