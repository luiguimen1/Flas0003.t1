<center>
    <h1>Formulario de registro Proveedor</h1>
    <div class="COL-12">
        <div class="COL-4" style="float: left;">
            <form id="formRegistro" name="formRegistro">
                <div class="COL-12">
                    <div class="label">
                        <label>Nit</label>
                    </div>
                    <div class="input">
                        <input type="text" id="nit" name="nit" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Nombre proveedor</div>
                    <div class="input">
                        <input type="text" id="nom" name="nom" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Direccion</div>
                    <div class="input">
                        <input type="text" id="dir" name="dir" value=""/>
                    </div>
                </div>

                <div class="COL-12">
                    <div class="label">Telefono</div>
                    <div class="input">
                        <input type="text" id="tele" name="tele" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Contacto</div>
                    <div class="input">
                        <input type="text" id="cont" name="cont" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Actividad economica</div>
                    <div class="input">
                        <textarea id="act" name="act"></textarea>
                    </div>
                    <div>
                        <button type="submit">Registrar</button>
                        <button type="reset" id="limpiar">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="COL-12" id="Listado">
            <button id="traerListado">Traer Lista</button>
            <div class="COL-12" id="listadoMio">
                <table class="COL-12" border="1">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Genero</th>
                            <th>Correo</th>
                            <th>tele</th>
                            <th>Ciudad</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="ListaTabla">

                    </tbody>
                </table>
            </div>
        </div>
        <div id="SQL"></div>
    </div>
</center>