<?php 
namespace Bll;
use \Pub\Fram;
use \Pub\SysFram;

class Pro
{

    //--user code start--
    
    public static function CheckPriceNum($Price)
    {
        if(!is_numeric($Price) || $Price<0)
            return false;
        else
            return true;
    }
    
    public static function UpdateShengShiQuXian($Id,$WuLiuId,$Conn=null)
    {
        $wuliu = \Bll\ProYunFei::Model($WuLiuId);
         
        $m2=new \Model\Pro();
        $m2->Id($Id);
        $m2->Sheng(0);
        $m2->Shi(0);
        $m2->Qu(0);
        $m2->Xian(0);
         
        $m2->Sheng($wuliu->Sheng());
        $m2->Shi($wuliu->Shi());
        $m2->Qu($wuliu->Qu());
        $m2->Xian($wuliu->Xian());
        //$m2->EditTime(\Pub\Fram::Date());
        return $m2->Update(null,$Conn,false);
         
    }
	
	//--user code end--

	public static function Insert($m,$Conn=null)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\Pro::Insert($m,$Conn);
	}

	public static function Update($m,$Whare='',$Conn=null,$_IfRowCount=true)
	{
	    $m->EditTime(\Pub\Fram::Date());
		return \Dal\Pro::Update($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function UpdateWhere($m,$Whare,$Conn=null,$_IfRowCount=true)
	{
	    return \Dal\Pro::UpdateWhere($m,$Whare,$Conn,$_IfRowCount);
	}
	
	public static function ForUpdate($Id,$Conn)
	{
		return \Dal\Pro::ForUpdate($Id,$Conn);
	}

	public static function Del($Id,$Conn=null)
	{
		return \Dal\Pro::Del($Id,$Conn);
	}

	public static function DelRows($IDS,$Conn=null)
	{
		return \Dal\Pro::DelRows($IDS,$Conn);
	}

	public static function DelWhere($w_arr,$Conn=null)
	{
		return \Dal\Pro::DelWhere($w_arr,$Conn);
	}
	
	public static function Row($Id = -1,$Whare = "",$Fields = "*",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Pro::Row($Id,$Fields,$Whare,$Conn,$ForUpdate);
	}
	
	public static function Column($Id,$SqlField='*',$Whare='',$Conn=null)
	{
	    $Id=intval($Id);
	    if(Fram::CheckNum($Id))
	        $Whare=["ID=?",[$Id]];
	    return \Dal\Pro::Column($SqlField,$Whare,$Conn);
	}
	
	public static function Model($Id,$Whare = "",$Conn=null,$ForUpdate=false)
	{
	    return \Dal\Pro::Model($Id,$Whare,$Conn,$ForUpdate);
	}
	
	public static function GetList($_PageNum,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\Pro::GetList($_PageNum,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
	//index列表
	public static function GetListByIndex($_LastID,$_PageSize,$_Where="",&$_RecordCount=0,$_Fields="",$_OrderBy="",$Conn=null)
	{
	    if(!$_OrderBy || $_OrderBy=='')
	        $_OrderBy='ID desc';
	    return \Dal\Pro::GetListByIndex($_LastID,$_PageSize,$_RecordCount,$_Fields,$_Where,$_OrderBy,$Conn);
	}
}