delimiter //
create trigger actuDisponiPro before insert on entradas
for each row begin
  update producto set cantidad = cantidad + new.cantidad where id = new.fkproducto;
end
delimiter;

delimiter //
create trigger actuSalidaPro before insert on detallesVenta
for each row begin
  update producto set cantidad = cantidad - new.cantidad where id = new.fkproducto;
end
 //
delimiter;



delimiter //
create trigger actuProXCanEnt before delete on entradas
for each row begin
  update producto set cantidad = cantidad - old.cantidad where id = old.fkproducto;
end
 //
delimiter;


delimiter //
create trigger actuProXCanSal before delete on detallesVenta
for each row begin
  update producto set cantidad = cantidad + old.cantidad where id = old.fkproducto;
end
 //
delimiter;

