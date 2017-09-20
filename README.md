# 分页组件

提供分页设计结构，包括两个接口：

（1）Delz\Paginator\Contract\IPager   分页接口

（2）Delz\Paginator\Contract\IPagerAdapter 分页适配器接口

Delz\Paginator\Contract\IPager接口在组件内Delz\Paginator\Pager类已经实现

您可以根据所用框架实现Delz\Paginator\Contract\IPagerAdapter接口实现以下两个方法：

getResults($offset, $limit); //返回数据集

count(); //获取记录条数

然后将适配器注入到Pager对象，即可获取分页数据

下面是演示代码：

```php

<?php

//此文件实现适配器SimpleAdapter

namespace Example;

use Delz\Paginator\Contract\IPagerAdapter;

class SimpleAdapter implements IPagerAdapter
{
 
    /**
     * 数据集数组
     *
     * @var array
     */
    protected $array = [];
    
   /**
     * 构造方法
     *
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }
        
    /**
     * {@inheritdoc}
     */
    public function getResults($offset, $limit)
    {
        return array_slice($this->array, $offset, $limit);
    }
    
    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->array);
    }
}
```

```php
<?php
//此文件演示如何用SimpleAdapter获取分页数据

use Example\SimpleAdapter;
use Delz\Paginator\Pager;

//自动加载类的代码此处省略

//生成一个数据集
$data = [];
for($i=0; $i<1000; $i++) {
    $data[] = $i;
}

$simple = new SimpleAdapter($data);

$pager = new Pager($simple);

//获取当前分页数据
print_r($pager->getResults());

//获取数据条目
echo $pager->getTotalCount();

//获取分页数
echo $pager->getPageCount();

//默认页面是第一页，修改当前页面，重新获取分页数据,第一页的编码是1
$pager->setPage(2);
print_r($pager->getResults());

//获取第一页和最后一页页码
echo $pager->getFirstPage();
echo $pager->getLastPage();

//判断是否第一页或者最后一页
echo $pager->isFirstPage();
echo $pager->isLastPage();

//判断是否需要分页，不超过一页说明不要分页
echo $pager->isPaginable();

//获取上一页和下一页页码
echo $pager->getPrePage();
echo $pager->getNextPage();

//获取和设置最多页面显示，并且显示页码
//说明：总页数是100，当前页是50，把页面显示的时候不可能把所有页面显示出来，默认maxPages=10,就会显示46,47,48,49,50,51,52,53,54,55
echo $pager->getMaxPages(); //获取最多页面显示
$pager->setMaxPages(20); //设置最多页数
print_r($pager->getPages()); //获取分页数数组

//设置和获取每页显示记录数,默认是20
echo $pager->getPageSize();
$pager->setPageSize(10);












