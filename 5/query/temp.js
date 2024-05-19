db.orders.aggregate([
    {
      $lookup: {
        from: "products",
        localField: "K_PP",
        foreignField: "K_PP",
        as: "product_info"
      }
    },
    {
      $unwind: "$product_info"
    },
    {
      $match: {
        $or: [
          {
            $and: [
              { D_REAL: { $gte: new Date("2019-04-01") } },
              { D_REAL: { $lt: new Date("2019-05-01") } }
            ]
          },
          {
            $and: [
              { D_REAL: { $gte: new Date("2019-06-01") } },
              { D_REAL: { $lt: new Date("2019-07-01") } }
            ]
          }
        ]
      }
    },
    {
      $addFields: {
        "Повна назва товару": {
          $concat: [
            "$product_info.PRODUCT.name",
            " ",
            "$product_info.FIRM.name"
          ]
        }
      }
    },
    {
      $addFields: {
        "Ціна реалізації": {
          $cond: {
            if: { $lte: ["$KIL", 15] },
            then: { $multiply: ["$product_info.C_YO", 1.03] },
            else: "$product_info.C_YO"
          }
        },
        "Вартість": {
          $multiply: [
            {
              $cond: {
                if: { $lte: ["$KIL", 15] },
                then: { $multiply: ["$product_info.C_YO", 1.03] },
                else: "$product_info.C_YO"
              }
            },
            "$KIL"
          ]
        }
      }
    },
    {
      $project: {
        _id: 0,
        "Повна назва товару": 1,
        "Дата реалізації": "$D_REAL",
        "Кількість реалізації": "$KIL",
        "Вартість": 1
      }
    }
  ]).pretty();
  