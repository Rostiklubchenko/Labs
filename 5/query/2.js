db.getCollection('sales').aggregate(
    [
      {
        $lookup: {
          from: 'products',
          localField: 'K_PP',
          foreignField: 'K_PP',
          as: 'product_info'
        }
      },
      { $unwind: '$product_info' },
      {
        $match: {
          $or: [
            {
              $and: [
                {
                  D_REAL: {
                    $gte: ISODate(
                      '2019-04-01T00:00:00.000Z'
                    )
                  }
                },
                {
                  D_REAL: {
                    $lt: ISODate(
                      '2019-05-01T00:00:00.000Z'
                    )
                  }
                }
              ]
            },
            {
              $and: [
                {
                  D_REAL: {
                    $gte: ISODate(
                      '2019-06-01T00:00:00.000Z'
                    )
                  }
                },
                {
                  D_REAL: {
                    $lt: ISODate(
                      '2019-07-01T00:00:00.000Z'
                    )
                  }
                }
              ]
            }
          ]
        }
      },
      {
        $addFields: {
          'Повна назва товару': {
            $concat: [
              '$product_info.PRODUCT.name',
              ' ',
              '$product_info.FIRM.name'
            ]
          }
        }
      },
      {
        $addFields: {
          Вартість: {
            $round: [
              {
                $multiply: [
                  {
                    $cond: {
                      if: { $lte: ['$KIL', 15] },
                      then: {
                        $multiply: [
                          '$product_info.C_YO',
                          1.03
                        ]
                      },
                      else: '$product_info.C_YO'
                    }
                  },
                  '$KIL'
                ]
              },
              5
            ]
          }
        }
      },
      {
        $project: {
          _id: 0,
          'Повна назва товару': 1,
          'Дата реалізації': '$D_REAL',
          'Кількість реалізації': '$KIL',
          Вартість: 1
        }
      }
    ],
    { maxTimeMS: 60000, allowDiskUse: true }
  );