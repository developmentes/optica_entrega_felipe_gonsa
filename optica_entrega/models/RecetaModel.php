<?php

namespace models;

require_once("Conexion.php");

class RecetaModel
{

    public function insertarReceta($data)
    {

        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C,:D,:E,:F,:G,:H,:I,:J:,:K,:L,:M
        ,:N,:O,:P,:Q,:R,:S,:T,:U,:V,:W)");
        $stm->bindParam(":A", $data['tipo_lente']);
        $stm->bindParam(":B", $data['esfera_oi']);
        $stm->bindParam(":C", $data['esfera_od']);
        $stm->bindParam(":D", $$data['cilindro_oi']); //123=> md5(123)=>wertyui56789234ds
        $stm->bindParam(":E", $data['cilindro_od']);
        $stm->bindParam(":F", $data['eje_oi']);
        $stm->bindParam(":G", $data['eje_od']);
        $stm->bindParam(":H", $data['prisma']);
        $stm->bindParam(":I", $data['base']);
        $stm->bindParam(":J", $data['armazon']);
        $stm->bindParam(":K", $data['material_cristal']);
        $stm->bindParam(":L", $data['tipo_cristal']);
        $stm->bindParam(":M", $data['distancia_pupilar']);
        $stm->bindParam(":N", $data['valor_lente']);
        $stm->bindParam(":O", $data['fecha_entrega']);
        $stm->bindParam(":P", $data['fecha_retiro']);
        $stm->bindParam(":Q", $data['observacion']);
        $stm->bindParam(":R", $data['rut_cliente']);
        $stm->bindParam(":S", $data['fecha_visita_medico']);
        $stm->bindParam(":T", $data['rut_medico']);
        $stm->bindParam(":U", $data['nombre_medico']);
        $stm->bindParam(":V", $data['rut_usuario']);
        $stm->bindParam(":W", $data['estado']);

        return $stm->execute();
    }

    public function buscarRecetaXRut($rut)
    {
        $sql = ' select id_receta "id", tipo_lente, esfera_oi, esfera_od, ';
        $sql .= ' cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base, ';
        $sql .= ' ar.nombre_armazon "armazon", mt.material_cristal, ';
        $sql .= ' tc.tipo_cristal, distancia_pupilar, valor_lente "precio", ';
        $sql .= ' fecha_entrega, fecha_retiro, observacion, cl.rut_cliente, ';
        $sql .= ' cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor", ';
        $sql .= ' receta.estado ';
        $sql .= ' from receta ';
        $sql .= ' inner join material_cristal mt on mt.id_material_cristal=receta.material_cristal ';
        $sql .= ' inner join armazon ar on ar.id_armazon = receta.armazon ';
        $sql .= ' inner join tipo_cristal tc on tc.id_tipo_cristal = receta.tipo_cristal ';
        $sql .= ' inner join cliente cl on cl.rut_cliente = receta.rut_cliente ';
        $sql .= ' inner join usuario us on us.rut = receta.rut_usuario ';
        $sql .= ' where receta.rut_cliente = :A ';

        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $rut);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarRecetaXFecha($fecha)
    {
        $sql = 'select id_receta "id", tipo_lente, esfera_oi, esfera_od,
            cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base,
            ar.nombre_armazon "armazon", mt.material_cristal,
            tc.tipo_cristal, distancia_pupilar, valor_lente "precio",
            fecha_entrega, fecha_retiro, observacion, cl.rut_cliente,
            cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor",
            receta.estado
            from receta
            inner join material_cristal mt 
                on mt.id_material_cristal=receta.material_cristal
            inner join armazon ar 
                on ar.id_armazon = receta.armazon
            inner join tipo_cristal tc
                on tc.id_tipo_cristal = receta.tipo_cristal
            inner join cliente cl 
                on cl.rut_cliente = receta.rut_cliente
            inner join usuario us
                on us.rut = receta.rut_usuario
            where receta.fecha_entrega = :A ';
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $fecha);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarRecetaXID($id)
    {
        $sql = ' select id_receta "id", tipo_lente, esfera_oi, esfera_od, ';
        $sql .= ' cilindro_oi, cilindro_od, eje_oi, eje_od, prisma, base, ';
        $sql .= ' ar.nombre_armazon "armazon", mt.material_cristal, ';
        $sql .= ' tc.tipo_cristal, distancia_pupilar, valor_lente "precio", ';
        $sql .= ' fecha_entrega, fecha_retiro, observacion, cl.rut_cliente, ';
        $sql .= ' cl.nombre_cliente, cl.telefono_cliente, us.nombre "nombre_vendedor", ';
        $sql .= ' receta.estado ';
        $sql .= ' from receta ';
        $sql .= ' inner join material_cristal mt on mt.id_material_cristal=receta.material_cristal ';
        $sql .= ' inner join armazon ar on ar.id_armazon = receta.armazon ';
        $sql .= ' inner join tipo_cristal tc on tc.id_tipo_cristal = receta.tipo_cristal ';
        $sql .= ' inner join cliente cl on cl.rut_cliente = receta.rut_cliente ';
        $sql .= ' inner join usuario us on us.rut = receta.rut_usuario ';
        $sql .= ' where receta.id_receta = :A ';

        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $id);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function getMateriales()
    {
        $stm = Conexion::conector()->prepare("select * from material_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getArmazones()
    {
        $stm = Conexion::conector()->prepare("select * from armazon");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTipos()
    {
        $stm = Conexion::conector()->prepare("select * from tipo_cristal");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
