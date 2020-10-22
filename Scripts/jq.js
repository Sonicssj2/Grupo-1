/*constantes*/
const DN="DNI";
const LC="LC";
const LE="LE";
const TD='#tipo_documento';
const D='#numero_documento';
const OS="option:selected";
//
//
/*funciones*/
$(function(){
	'use strict'
	
	function maxmin(max,min){
		$(D).attr('max',max);
		$(D).attr('min',min);
	}
	
	$(TD).on('change', function(){
		if ($(TD).children(OS).val()==DN) {
			maxmin(99999999,10000000);
		}
		else{
			if ($(TD).children(OS).val()==LC||$(TD).children(OS).val()==LE) {
				maxmin(7999999,1);
			}
			else{
				maxmin(9999999999,1);
			}
		}
	})
});