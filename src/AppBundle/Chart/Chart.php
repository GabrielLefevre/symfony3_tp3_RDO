<?php
/**
 * Created by PhpStorm.
 * User: DEV2
 * Date: 05/04/2017
 * Time: 14:16
 */

namespace AppBundle\Chart;


use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\Material\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;

class Chart
{
    private $chartData;

    public function __construct(ChartData $chartData)
    {
        $this->chartData = $chartData;
    }

    public function testGraph() {
        $tab = $this->chartData->dataTestGraph();

        $chart = new PieChart();
        $chart->getData()->setArrayToDataTable($tab);
        $chart->getOptions()->setTitle('Test du PieChart');
        $chart->getOptions()->setHeight(500);
        $chart->getOptions()->setWidth(900);

        return $chart;
    }

    public function cableBy() {
        $tab=$this->chartData->dataCableBy();

        $chart = new PieChart();
        $chart->getData()->setArrayToDataTable($tab);
        $chart->getOptions()->setTitle('Parc d\'afficheurs');
        $chart->getOptions()->setHeight(500);
        $chart->getOptions()->setWidth(900);

        return $chart;
    }

    public function structure() {
        $tab = $this->chartData->dataStructure();

        $chart = new ColumnChart();
        $chart->getData()->setArrayToDataTable($tab);
    $chart->getOptions()->setHeight(500);
    $chart->getOptions()->setWidth(900);

        return $chart;
}

}