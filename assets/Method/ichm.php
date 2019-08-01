<?php
include 'kmeans.php';
include 'math.php';

function groupRating($content, $k = 4){
    // clutering
    $kmeans = new Jacobemerick\KMeans\Kmeans($content);
    $kmeans->cluster($k); // cluster into three sets
    $clustered_data = $kmeans->getClusteredData();
    $centroids = $kmeans->getCentroids();

    // group rating
  $matrixPro = [];
  foreach ($centroids as $numberCluster) {
      $maxCS = 0;
      $CS = [];
      $rowCluster = [];
    
      // CS(j,k) and MaxCS(j,k)
      foreach ($content as $rowItem) {
          // Eucledian distance
          $De = distance($rowItem, $numberCluster);
          $CS[] = $De;
          if ($maxCS < $De) $maxCS = $De;
      }
      
      // Pro(j,k)
        foreach ($CS as $valCS) {
            $rowCluster[] = 1 - ($valCS / $maxCS);
        }
    
      // assign
      $matrixPro[] = $rowCluster;
  }
  
  return $matrixPro;
}

/*
    $ratingmobilA = [5,3,4]; => kumpulan rating semua orang
    $ratingMobilB = [4,5,5]; => kumpulan rating semua orang
    $rataRatingMobilA = 4.0; => rata rata rating mobil A
    $rataRatingMobilB = 4.67; => rata rata rating mobil B
*/
// function pearson($ratingmobilA, $ratingMobilB, $rataRatingMobilA, $rataRatingMobilB) {
//     $hasilAtas = 0;
//     $hasilBawah = 0;
//     $hasilBawahA = 0;
//     $hasilBawahB = 0;

//     for($i=0; $i<count($ratingmobilA); $i++) {
//         $hasilAtas += (($ratingmobilA[$i]-$rataRatingMobilA)*($ratingMobilB[$i]-$rataRatingMobilB));
//         $hasilBawahA += pow(($ratingmobilA[$i]-$rataRatingMobilA), 2);
//         $hasilBawahB += pow(($ratingMobilB[$i]-$rataRatingMobilB), 2);
//     }
//     $hasilBawah = sqrt($hasilBawahA)*sqrt($hasilBawahB);
//     $simAb = $hasilAtas/$hasilBawah;

//     return $simAb;
// }

function pearsonSim($rating){
    // inisialisasi variabel
  $data = transpose($rating);
  $simPembilang = 0;
  $simPenyebutA = 0;
  $simPenyebutB = 0;
  $similarity = [];
  // rata - rata
  $mean = [];
  foreach ($data as $val) {
      $mean[] = mean($val);
  }

  // proses similarity
  foreach ($data as $i => $iVal) {
      $rowSimilarity = [];
      foreach ($data as $j => $jVal) {
        foreach ($jVal as $colIndex => $val) {
            $calcI = $data[$i][$colIndex] - $mean[$i];
            $calcJ = $data[$j][$colIndex] - $mean[$j];
            $simPembilang += ($calcI * $calcJ);
            $simPenyebutA += pow($calcI, 2);
            $simPenyebutB += pow($calcJ, 2);
        }
          $simPenyebut = sqrt($simPenyebutA) * sqrt($simPenyebutB);
          $rowSimilarity [] = ($simPenyebut !== 0) ?
                ($simPembilang / $simPenyebut) :
                0;
          $simPembilang = 0;
          $simPenyebutA = 0;
          $simPenyebutB = 0;
      }

      $similarity[] = $rowSimilarity;
  }
  
  return $similarity;
}

/*
    $klasterMobilA = [0.9, 0.1, 0, 0]; => klaster 1-n untuk mobil A
    $klasterMobilB = [0.5, 0.3, 0.2, 0]; => klaster 1-n untuk mobil B
    $rataKlaster = [0.62, 0.1, 0.16, 0.07]; => rata rata klaster 1-n
*/
// function adjustCor($klasterMobilA, $klasterMobilB, $rataKlaster) {
//     $hasilAtas = 0;
//     $hasilBawah = 0;
//     $hasilBawahA = 0;
//     $hasilBawahB = 0;
    
//     for($i=0; $i<count($rataKlaster); $i++) {
//         $hasilAtas += (($klasterMobilA[$i]-$rataKlaster[$i])*($klasterMobilB[$i]-$rataKlaster[$i]));
//         $hasilBawahA += pow(($klasterMobilA[$i]-$rataKlaster[$i]), 2);
//         $hasilBawahB += pow(($klasterMobilB[$i]-$rataKlaster[$i]), 2);
//     }
//     $hasilBawah = sqrt($hasilBawahA)*sqrt($hasilBawahB);
//     $simAb = $hasilAtas/$hasilBawah;

//     return $simAb;
// }

function adjustSim($groupRating){
    // inisialisasi variabel
    $mean = [];
    foreach ($groupRating as $value) {
        $mean[] = mean($value);
    }

  $simPembilang = 0;
  $simPenyebutA = 0;
  $simPenyebutB = 0;
  $similarity = [];
  $data = transpose($groupRating);

  // proses similarity
  foreach ($data as $k => $kVal) {
      $rowSimilarity = [];
      foreach ($data as $l => $lVal) {
        foreach ($lVal as $colIndex => $val) {
            $calcK = $data[$k][$colIndex] - $mean[$colIndex];
            $calcL = $data[$l][$colIndex] - $mean[$colIndex];
            $simPembilang += ($calcK * $calcL);
            $simPenyebutA += pow($calcK, 2);
            $simPenyebutB += pow($calcL, 2);
        }  
          $simPenyebut = sqrt($simPenyebutA) * sqrt($simPenyebutB);
          $rowSimilarity[] = ($simPenyebut !== 0) ? ($simPembilang / $simPenyebut) : 0;
          $simPembilang = 0;
          $simPenyebutA = 0;
          $simPenyebutB = 0;
      }

      $similarity[] = $rowSimilarity;
  }

  return $similarity;
}

/*
    $simAbPearson = nilai pearson
    $simAbAdjustCor = nilai adjus corelation
    $coef = 0.4; => koefisien
*/
// function linearCombination($simAbPearson, $simAbAdjustCor, $coef) {
//     return ($simAbPearson*(1-$coef))+($simAbAdjustCor*$coef);
// }

function linearCombination($pearsonSim, $adjustSim, $coefisien = 0.5){
    $similarity = [];

    foreach ($pearsonSim as $rowIndex => $row) {
        $rowSimilarity = [];
        foreach ($row as $colIndex => $col) {
            $lc = ($col * (1 - $coefisien)) + ($adjustSim[$rowIndex][$colIndex] * $coefisien);
            $rowSimilarity[] = $lc;
        }

        $similarity[] = $rowSimilarity;
    }

  return $similarity;
}

// function nonColdStartBaru($mobilYgMana, $ratingMobilUserA, $indexRk ,$ratingMobil, $rataRatingMobil, $klasterMobil, $rataKlaster){
//     $hasilAtas = 0;
//     $hasilBawah = 0;
//     $stringTmp1="";
//     $stringTmp2="";
    
//     for($i=0; $i<count($ratingMobilUserA); $i++) {
//         if($i==$mobilYgMana) {
//             $tmp3 = 0;
//         } else {
//             $tmp1 = pearson($ratingMobil[$mobilYgMana], $ratingMobil[$i], $rataRatingMobil[$mobilYgMana], $rataRatingMobil[$i]);
//             $tmp2 = adjustCor($klasterMobil[$mobilYgMana], $klasterMobil[$i], $rataKlaster);
//             $tmp3 = linearCombination($tmp1, $tmp2, 0.4);
//         }

//         $hasilAtas += ($ratingMobilUserA[$i]-$rataRatingMobil[$i])*$tmp3;
//         $hasilBawah += abs($tmp3);

//         $stringTmp1.="(".number_format((float)$ratingMobilUserA[$i], 2, '.', '')."-".number_format((float)$rataRatingMobil[$i], 2, '.', '').")*".number_format((float)$tmp3, 2, '.', '')." + ";
//         $stringTmp2.=number_format((float)$tmp3, 2, '.', '')."|";
//     }
//     echo $rataRatingMobil[$indexRk]."+<br/>";
//     echo $stringTmp1."<br/>";
//     echo $stringTmp2."<br/>";
    
//     return $rataRatingMobil[$indexRk]+($hasilAtas/$hasilBawah);
// }

function weightedSum($ratingItem, $linearSim, $indexUser){
    $coldStart = [];
    $prediksiPembilang = 0;
    $prediksiPenyebut = 0;
  
    foreach ($ratingItem[$indexUser] as $k => $kVal) {
        foreach ($ratingItem[$indexUser] as $i => $iVal) {
            $prediksiPembilang += $iVal * $linearSim[$k][$i];
            $prediksiPenyebut += abs($linearSim[$k][$i]);
        }
        $ws = ($prediksiPenyebut !== 0) ? $prediksiPembilang / $prediksiPenyebut : 0;
        $prediksiPembilang = 0;
        $prediksiPenyebut = 0;
        $coldStart[] = $ws;
    }

    return $coldStart;
  };

function weightedAverageDeviation($ratingItem, $linearSim, $indexUser) {
  $mean = [];
    foreach (transpose($ratingItem) as $value) {
      $mean[] = mean($value);
  }
  $nonColdStart = [];
  $prediksiPembilang = 0;
  $prediksiPenyebut = 0;

    foreach ($ratingItem[$indexUser] as $k => $kVal) {
        foreach ($ratingItem[$indexUser] as $i => $iVal) {
            $prediksiPembilang += ($iVal - $mean[$i]) * $linearSim[$k][$i];
            $prediksiPenyebut += abs($linearSim[$k][$i]);
        }
        $wad = ($prediksiPenyebut !== 0) ?
        $mean[$k] + ($prediksiPembilang / $prediksiPenyebut) :
        0;
        $prediksiPembilang = 0;
        $prediksiPenyebut = 0;
        $nonColdStart[] = $wad;
    }

  return $nonColdStart;
};

function ichm($rating, $konten, $indexUser, $coefisien = 0.5){
    $group = groupRating($konten);
    $pearsonSim = pearsonSim($rating);
    $adjustSim = adjustSim($group);
    $lc = linearCombination($pearsonSim, $adjustSim);
    $coldStart = weightedAverageDeviation($rating, $lc, $indexUser);

    return $coldStart;
}

$rataKlaster = [0.62, 0.1, 0.16, 0.07];
$rataRating = [4.0, 4.67, 4, 4, 4];

$ratingMobilUserA = [5, 4, 5, 2, 5];
$ratingMobilUserB = [3, 5, 3, 5, 4];

$ratingMobilUserSemua = array(
    array(5, 4, 5, 2, 5),
    array(3, 5, 3, 5, 4),
    array(4, 5, 4, 5, 3),
);

// $ratingMobil=array(
//     array(5, 3, 4),
//     array(4, 5, 5),
//     array(5, 3, 4),
//     array(2, 5, 5),
//     array(5, 4, 3)
// );

$ratingMobil=array(
    [0, 2, 2, 3, 5, 4, 2, 1, 5, 0], // -> user
  [1, 0, 5, 2, 1, 3, 1, 5, 1, 2],
  [4, 1, 5, 1, 1, 1, 5, 0, 3, 4],
  [0, 5, 0, 0, 3, 2, 3, 3, 4, 1],
  [5, 0, 0, 1, 2, 2, 0, 4, 1, 0],
  [3, 5, 2, 3, 1, 2, 3, 5, 0, 1],
  [2, 0, 3, 5, 0, 1, 2, 3, 5, 0],
);

$klasterMobil=array(
    array(0.9, 0.1, 0, 0),
    array(0.5, 0.3, 0.2, 0),
    array(0, 0, 0.5, 0.2),
    array(0.95, 0, 0, 0),
    array(0.75, 0.1, 0.1, 0.15)
);

$contentItem = [
    [10600, 2.94],
    [7870, 0.96],
    [1353, 1.11],
    [657, 1.73],
    [5885, 1.11],
    [6913, 3.01],
    [3109, 4.08],
    [4180, 1.51],
    [7524, 0.66],
    [4082, 1.37],
];
echo '<pre>';


$rekomendasi = ichm($ratingMobil, $contentItem, 0);
print_r($rekomendasi);

// $rataRatingMobil=array(4.00,4.67,4.00,4.00,4.00);

// echo nonColdStartBaru(0, $ratingMobilUserSemua[0], 1 ,$ratingMobil, $rataRatingMobil, $klasterMobil, $rataKlaster);