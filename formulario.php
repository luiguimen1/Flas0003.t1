<center>
    <h1>Formulario de control de registro</h1>
    <div class="COL-12">
        <div class="COL-4" style="float: left;">
            <form id="formRegistro" name="formRegistro">
                <div class="COL-12">
                    <div class="label">
                        <label>CC</label>
                    </div>
                    <div class="input">
                        <input type="text" id="CC" name="CC" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Nombre</div>
                    <div class="input">
                        <input type="text" id="nom" name="nom" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Apellido</div>
                    <div class="input">
                        <input type="text" id="ape" name="ape" value=""/>
                    </div>
                </div>

                <div class="COL-12">
                    <div class="label">Correo</div>
                    <div class="input">
                        <input type="text" id="correo" name="correo" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Conf Correo</div>
                    <div class="input">
                        <input type="text" id="correo1" name="correo1" value=""/>
                    </div>
                </div>
                <div class="COL-12">
                    <div class="label">Telefono</div>
                    <div class="input">
                        <input type="number" id="tele" name="tele" value=""/>
                    </div>
                    <div class="COL-12">
                        <div class="label">Ciudad</div>
                        <div class="input">
                            <select id="ciudad" name="ciudad">
                                <option value="" selected>Seleccione</option>
                                <option value="1">Bogota</option>
                                <option value="2">Lima</option>
                                <option value="3">Ciudad de Mexico</option>
                                <option value="4">Buenos Aires</option>
                            </select>
                        </div>
                    </div>
                    <div class="COL-12">
                        <div class="label">Genero</div>
                        <div class="input">
                            <label>Femenino</label>
                            <input type="radio" id="genero" name="genero" value='1'/>
                            <label>Masculino</label>
                            <input type="radio" id="genero" name="genero" value='2'/>
                            <label>LGTBI</label>
                            <input type="radio" id="genero" name="genero" value='3'/>
                        </div>
                    </div>
                    <div>
                        <button type="submit">Registrar</button>
                        <button type="reset" id="limpiar">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="COL-7" style="float: right;">
            <div class="COL-12">
                <button type="button" id="listadoFull">Todos</button>
                <button>Femenino</button>
                <button>Masculino</button>
                <button>LGTBI</button>
                <select id="Filciudad" name="Filciudad">
                    <option value="" selected>Seleccione</option>
                    <option value="1">Bogota</option>
                    <option value="2">Lima</option>
                    <option value="3">Ciudad de Mexico</option>
                    <option value="4">Buenos Aires</option>
                </select>
            </div>
            <div class="COL-12">
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

    </div>
</center>