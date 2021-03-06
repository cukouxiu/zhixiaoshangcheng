<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>

<div id="rightTop">
  <h1><p><a href="index.php?act=welcome" style="text-decoration:none;"><?php echo $this->_var['setting']['site_name']; ?></a> &nbsp;>&nbsp;报表统计&nbsp;&nbsp;>&nbsp;&nbsp; 销售明细</p></h1>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
          <div class="left">
                <input type="hidden" name="app" value="sale_list" />
                <input type="hidden" name="act" value="index" />
               开始时间:
                <input class="queryInput2" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" class="pick_date" />
                结束时间:<input class="queryInput2" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" class="pick_date" />
               
             <input name="submit" type="submit" class="formbtn" value="查询" />
          </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=sale_list">撤销检索</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['orders']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['orders']): ?>
        <tr class="tatr1">
            <td width="25%" class="firstCell">商品名称</td>
            <td width="15%">订单号</td>
            <td width="15%">下单时间</td>
            <td width="10%">数量</td>
			<td width="10%">单价</td>   
            <td width="10%">售出时间</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2">
            <td class="firstCell"><a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=goods&amp;id=<?php echo $this->_var['order']['goods_id']; ?>"><?php echo htmlspecialchars($this->_var['order']['goods_name']); ?></a></td>
            <td><?php echo $this->_var['order']['order_sn']; ?></td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['goods_num']); ?></td>
			<td><?php echo price_format($this->_var['order']['goods_price']); ?></td>
            <td><?php echo local_date("Y-m-d",$this->_var['order']['finished_time']); ?></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php if ($this->_var['orders']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
