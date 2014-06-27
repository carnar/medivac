@layout('main')
@section('content')
        <div class="row">
            <div id="prediction_table">
                <form method="POST" action="http://brasil14.app:8000/prediction" accept-charset="UTF-8">
                    <input name="_token" type="hidden" value="FrzzE4D1Zb2q6y4aKR1VsBNypiNltE0qXS94bFI0">
                    <div class="date_row">Sábado 28 de junio</div>
                    <div class="match">
                        <div class="team-a">
                            <label class="name br" for="brasil">Brasil</label>
                            <input class="score" name="brasil" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name cl" for="childe">Chile</label>
                            <input class="score" name="chile" type="text" />
                        </div>
                    </div>
                    <div class="match">
                        <div class="team-a">
                            <label class="name br" for="brasil">Brasil</label>
                            <input class="score" name="brasil" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name cl" for="childe">Chile</label>
                            <input class="score" name="chile" type="text" />
                        </div>
                    </div>
                    <div class="date_row">Sábado 28 de junio</div>
                    <div class="match">
                        <div class="team-a">
                            <label class="name br" for="brasil">Brasil</label>
                            <input class="score" name="brasil" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name cl" for="childe">Chile</label>
                            <input class="score" name="chile" type="text" />
                        </div>
                    </div>
                    <div class="match">
                        <div class="team-a">
                            <label class="name br" for="brasil">Brasil</label>
                            <input class="score" name="brasil" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name cl" for="childe">Chile</label>
                            <input class="score" name="chile" type="text" />
                        </div>
                    </div>
                    <div class="date_row">Sábado 28 de junio</div>
                    <div class="match">
                        <div class="team-a">
                            <label class="name br" for="brasil">Brasil</label>
                            <input class="score" name="brasil" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name cl" for="childe">Chile</label>
                            <input class="score" name="chile" type="text" />
                        </div>
                    </div>
                    <div class="match">
                        <div class="team-a">
                            <label class="name br" for="brasil">Brasil</label>
                            <input class="score" name="brasil" type="text" />
                        </div>
                        <div class="team-b">
                            <label class="name cl" for="childe">Chile</label>
                            <input class="score" name="chile" type="text" />
                        </div>
                    </div>

                    <button type="submit">Jugar!</button>
                    <!-- modal -->
                    <div id="modal" class="notification">
                        <div id="modal_box">
                            <p>¿Estas seguro que vas a jugar con estas predicciones? Una vez aceptes no podrás editarlas</p>
                            <button class="red">Regresar</button>
                            <button class="green">Si, estoy seguro!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@stop