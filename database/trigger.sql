delimiter //
CREATE TRIGGER TrgPenerimaan AFTER INSERT ON dpenerimaan
FOR EACH ROW 
begin
  declare newNomerNota 			varchar(20);
  declare newKodeBahan			int(11); 
  declare newKodeSatuan		   	varchar(10);  
  declare newQtyTerima 		   	int(11); 
  declare newHrg	 			int(11); 
  
  declare dtKodeCabang			varchar(10); 
  declare dtQty				   	int(11); 
  declare dtStokAwal 		   	int(11); 
  declare dtStokAkhir		   	int(11);
  declare dtHarga			   	decimal(15,2);  
  declare dtHrgAvg 			   	decimal(15,2); 
  declare dtHrgAvgBaru		   	decimal(15,2);
  
  set newNomerNota				= new.nomernota; 
  set newKodeBahan				= new.kodebahan; 
  set newKodeSatuan				= new.kodesatuan; 
  set newQtyTerima 		   		= new.qtyterima;
  set newHrg	 				= new.hargabeli; 

  set dtKodeCabang 				= 'KC1'; 

  /**
  set dtKonversi 				= (SELECT konversi FROM mastersatuan WHERE namasatuan = newNamaSatuan); 
  set dtQty						= newQtyTerima * dtKonversi; 
  set dtHargaEceran				= (newHrgBaju - (newDiscount / 100 * newHrgBaju)) / dtKonversi; 
  **/
  
  set dtStokAwal   = (SELECT stokakhir FROM kartustok WHERE kodebahan = newKodeBahan and kodecabang  = dtKdCabang order by kodekartustok desc limit 1); 
  SET dtStokAkhir  = dtStokAwal + newQtyTerima;
  SET dtHrgAvg     = (SELECT hargaavg  FROM kartustok WHERE kodebahan = newKodeBahan and kodecabang  = dtKdCabang order by kodekartustok desc limit 1); 
  SET dtHrgAvgBaru = (dtHrgAvg * dtStokAwal + newQtyTerima * newHrg) / dtStokAkhir;
  update stokcabang set stok = dtStokAkhir where kodebahan = newKodeBahan and kodecabang = dtKdCabang;

  insert into kartustok
			(tanggal, kodecabang, kodebahan, jenis, noref, stokawal, debet, kredit, stokakhir, hargatrans, hargaavg)
		values
			(now(), dtKodeCabang, newKodeBahan, 'TERIMA', newNomerNota, dtStokAwal,  newQtyTerima, 0, dtStokAkhir, newHrg, dtHrgAvgBaru);
end;//
delimiter ;

-- Trigger TrgTransJual
-- =======================================
delimiter //
CREATE TRIGGER TrgTransJual AFTER INSERT ON djual
FOR EACH ROW 
begin
  declare newNomerNota			varchar(20); 
  declare newKodeBahan		   	int(11);  
  declare newQty	  		   	int(11); 
  declare newHrg	 			int(11); 
  
  declare dtKdCabang		   varchar(5); 
  declare dtQty				   int(11); 
  declare dtStokAwal 		   int(11); 
  declare dtStokAkhir		   int(11);
  declare dtHargaEceran		   decimal(15,2);  
  declare dtHrgAvg 			   decimal(15,2); 
  declare dtHrgAvgBaru		   decimal(15,2); 
  
  set newNomerNota				= new.nomernota; 
  set newKodeBahan		   		= new.kodebahan; 
  set newQty	  		   		= new.qty;
  set newHrg	 				= new.harga; 
  set dtKdCabang 				= (SELECT kodecabang FROM hjual WHERE nomernota = newNomerNota); 
  -- set dtKonversi 				= (SELECT konversi FROM mastersatuan WHERE namasatuan = newNamaSatuan); 
  set dtQty						= newQty; 
  set dtHargaEceran				= newHrg;
  
  set dtStokAwal   = 0;
  SET dtStokAkhir  = 0;
  SET dtHrgAvg     = newHrg;
  SET dtHrgAvgBaru = newHrg;
  
  -- update stokcabang set stok = dtStokAkhir where kodebahan = newKodeBahan and kodecabang = dtKdCabang;

  insert into kartustok
			(tanggal, kodecabang, kodebahan, jenis, noref, stokawal, debet, kredit, stokakhir, hargatrans, hargaavg)
		values
			(now(), dtKodeCabang, newKodeBahan, 'JUAL', newNomerNota, 0,  0, dtQty, 0, newHrg, dtHrgAvgBaru);			
end;//
delimiter ;